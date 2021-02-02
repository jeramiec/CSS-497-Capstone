CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `jeramiec`@`localhost` 
    SQL SECURITY DEFINER
VIEW `total_users` AS
    SELECT 
        COUNT(0) AS `total_accounts`
    FROM
        `account`