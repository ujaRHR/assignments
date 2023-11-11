-- Reajul Hasan Raju
-- Task 4

SELECT c.customer_name, ROUND(SUM(o.total_amount), 2) AS total_purchase_amount
FROM Customers c
LEFT JOIN Orders o ON c.customer_id = o.customer_id
GROUP BY c.customer_name
ORDER BY total_purchase_amount DESC
LIMIT 5;