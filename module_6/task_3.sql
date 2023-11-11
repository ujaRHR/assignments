-- Reajul Hasan Raju
-- Task 3

SELECT ct.category_name, COALESCE(ROUND((SUM(p.product_price * oi.product_quantity)), 2), 0) AS total_revenue
FROM Categories ct
LEFT JOIN Products p ON ct.category_id = p.category_id
LEFT JOIN Order_Items oi ON p.product_id = oi.product_id
GROUP BY ct.category_name
ORDER BY total_revenue DESC;