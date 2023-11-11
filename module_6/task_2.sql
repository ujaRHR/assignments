-- Reajul Hasan Raju
-- Task 2

SELECT oi.order_id, p.product_name, oi.product_quantity, o.total_amount
FROM Products p
INNER JOIN Order_Items oi ON p.product_id = oi.product_id
INNER JOIN Orders o ON oi.order_id = o.order_id
ORDER BY order_id ASC;