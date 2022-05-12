CREATE TABLE IF NOT EXISTS OrderItems(
    id int AUTO_INCREMENT PRIMARY KEY,
    order_id int,
    item_id int,
    quantity int,
    unit_cost DECIMAL(18,2) DEFAULT 0.00,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
    FOREIGN KEY (item_id) REFERENCES RM_Items(id),
    FOREIGN KEY (order_id) REFERENCES Orders(id),    
    check (quantity >= 0)
    
)