-- Reajul Hasan Raju
-- Task 1

SELECT c.*, (
    SELECT COUNT(o.customer_id) 
    FROM Orders o
    WHERE o.customer_id = c.customer_id
    ) AS total_orders
FROM Customers c
ORDER BY total_orders DESC;