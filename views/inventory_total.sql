CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `jeramiec`@`localhost` 
    SQL SECURITY DEFINER
VIEW `inventory_total` AS
    SELECT 
        `account`.`account_id` AS `account_id`,
        COUNT(`inventory`.`product_id`) AS `inventory_total`
    FROM
        (`account`
        JOIN `inventory` ON (`account`.`account_id` = `inventory`.`account_id`))
    GROUP BY 1