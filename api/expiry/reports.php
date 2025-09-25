<?php
/**
 * Tyazubwenge Training Center - Expiry Reports API
 * Generate expiry reports for printing
 */

require_once '../../config/api_config.php';

try {
    $db = getDB();
    
    $type = $_GET['type'] ?? 'all'; // all, expiring, expired
    $format = $_GET['format'] ?? 'json'; // json, pdf, csv
    
    $today = date('Y-m-d');
    $warningDays = fetchOne("SELECT setting_value FROM system_settings WHERE setting_key = 'expiry_warning_days'");
    $warningDays = $warningDays ? (int)$warningDays['setting_value'] : 30;
    $warningDate = date('Y-m-d', strtotime("+{$warningDays} days"));
    
    $whereClause = "WHERE p.expiry_date IS NOT NULL AND p.is_active = 1";
    $params = [];
    
    switch ($type) {
        case 'expiring':
            $whereClause .= " AND p.expiry_date <= ? AND p.expiry_date > ?";
            $params = [$warningDate, $today];
            break;
        case 'expired':
            $whereClause .= " AND p.expiry_date < ?";
            $params = [$today];
            break;
        default:
            $whereClause .= " AND p.expiry_date <= ?";
            $params = [$warningDate];
            break;
    }
    
    $products = fetchAll("
        SELECT p.*, c.name as category_name, s.name as supplier_name,
               DATEDIFF(p.expiry_date, ?) as days_until_expiry
        FROM products p 
        LEFT JOIN categories c ON p.category_id = c.id 
        LEFT JOIN suppliers s ON p.supplier_id = s.id
        {$whereClause}
        ORDER BY p.expiry_date ASC
    ", array_merge([$today], $params));
    
    // Get company settings for report header
    $companySettings = fetchAll("SELECT setting_key, setting_value FROM system_settings WHERE setting_key IN ('company_name', 'company_address', 'company_phone', 'company_email')");
    $settings = [];
    foreach ($companySettings as $setting) {
        $settings[$setting['setting_key']] = $setting['setting_value'];
    }
    
    $reportData = [
        'company' => $settings,
        'report_type' => $type,
        'generated_date' => date('Y-m-d H:i:s'),
        'total_products' => count($products),
        'products' => $products
    ];
    
    if ($format === 'pdf') {
        // Generate PDF report
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="expiry_report_' . $type . '_' . date('Y-m-d') . '.pdf"');
        
        // Simple PDF generation (you might want to use a proper PDF library)
        $html = generateExpiryReportHTML($reportData);
        echo $html;
    } else {
        APIResponse::success($reportData);
    }
    
} catch (Exception $e) {
    APIResponse::error('Failed to generate expiry report: ' . $e->getMessage(), 500);
}

function generateExpiryReportHTML($data) {
    $html = '<!DOCTYPE html>
    <html>
    <head>
        <title>Expiry Report - ' . $data['company']['company_name'] . '</title>
        <style>
            body { font-family: Arial, sans-serif; margin: 20px; }
            .header { text-align: center; margin-bottom: 30px; }
            .company-name { font-size: 24px; font-weight: bold; color: #2c5530; }
            .report-title { font-size: 18px; margin: 10px 0; }
            .report-info { font-size: 12px; color: #666; }
            table { width: 100%; border-collapse: collapse; margin-top: 20px; }
            th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
            th { background-color: #f2f2f2; font-weight: bold; }
            .expired { background-color: #ffebee; }
            .expiring { background-color: #fff3e0; }
            .footer { margin-top: 30px; text-align: center; font-size: 12px; color: #666; }
        </style>
    </head>
    <body>
        <div class="header">
            <div class="company-name">' . $data['company']['company_name'] . '</div>
            <div class="report-title">Product Expiry Report - ' . ucfirst($data['report_type']) . '</div>
            <div class="report-info">
                Generated on: ' . $data['generated_date'] . '<br>
                Total Products: ' . $data['total_products'] . '
            </div>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>SKU</th>
                    <th>Quantity</th>
                    <th>Unit Type</th>
                    <th>Unit Price</th>
                    <th>Expiry Date</th>
                    <th>Days Until Expiry</th>
                    <th>Supplier</th>
                </tr>
            </thead>
            <tbody>';
    
    foreach ($data['products'] as $product) {
        $rowClass = '';
        if ($product['days_until_expiry'] < 0) {
            $rowClass = 'expired';
        } elseif ($product['days_until_expiry'] <= 30) {
            $rowClass = 'expiring';
        }
        
        $html .= '<tr class="' . $rowClass . '">
            <td>' . htmlspecialchars($product['name']) . '</td>
            <td>' . htmlspecialchars($product['category_name']) . '</td>
            <td>' . htmlspecialchars($product['sku']) . '</td>
            <td>' . $product['quantity'] . '</td>
            <td>' . $product['unit_type'] . '</td>
            <td>₦' . number_format($product['unit_price'], 2) . '</td>
            <td>' . $product['expiry_date'] . '</td>
            <td>' . $product['days_until_expiry'] . '</td>
            <td>' . htmlspecialchars($product['supplier_name']) . '</td>
        </tr>';
    }
    
    $html .= '</tbody>
        </table>
        
        <div class="footer">
            <p>' . $data['company']['company_address'] . '</p>
            <p>Phone: ' . $data['company']['company_phone'] . ' | Email: ' . $data['company']['company_email'] . '</p>
        </div>
    </body>
    </html>';
    
    return $html;
}
?>




