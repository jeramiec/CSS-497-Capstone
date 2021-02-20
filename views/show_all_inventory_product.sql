CREATE VIEW show_all_inventory_product AS
SELECT p.product_id, p.name, p.color, s.status_name AS 'status', pt.name AS 'type', cat.category_name AS 'category', p.size, p.sku, pc.condition_name AS 'condition', i.inventory_id, i.account_id, i.description, i.listed_price, i.sold_price, i.sold_date, e.cost, e.purchase_date
FROM product p
INNER JOIN inventory i ON (p.product_id = i.product_id)
LEFT JOIN expense e ON (e.product_id = i.product_id)
LEFT JOIN status s ON (p.status_id = s.status_id)
LEFT JOIN product_type pt ON (p.product_type_id = pt.product_type_id)
LEFT JOIN category cat ON (p.category_id = cat.category_id)
LEFT JOIN product_condition pc ON (p.condition_id = pc.product_condition_id);