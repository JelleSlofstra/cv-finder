<?php

return [
    'table_name' => 'hobbies',

    'drop_scheme' => "SET FOREIGN_KEY_CHECKS = 0; DROP TABLE IF EXISTS `hobbies`; SET FOREIGN_KEY_CHECKS = 1",

    'scheme' => "CREATE TABLE IF NOT EXISTS `hobbies` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `user_id` int NOT NULL,
        `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
        `created` timestamp NOT NULL,
        `updated` timestamp DEFAULT CURRENT_TIMESTAMP,
        `deleted` timestamp DEFAULT NULL,
        `created_by` int(11) NOT NULL,
        `updated_by` int(11),
        `deleted_by` int(11),
        PRIMARY KEY (`id`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;",

    'relations' => [
        'ALTER TABLE `hobbies` ADD FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;',
        'ALTER TABLE `hobbies` ADD FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;',
        'ALTER TABLE `hobbies` ADD FOREIGN KEY (`updated_by`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;',
        'ALTER TABLE `hobbies` ADD FOREIGN KEY (`deleted_by`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;',
    ],

    'seeder' => [
        'type' => 'array',
        'data' => array([
            'user_id'       => 1,
            'name'          => 'kogelstoten',        
            'created'       => date('Y-m-d H:i:s'),
            'created_by'    => 1,
        ],
        [
            'user_id'       => 1,
            'name'          => 'schaken',    
            'created'       => date('Y-m-d H:i:s'),
            'created_by'    => 1,
        ],
        [
            'user_id'       => 1,
            'name'          => 'olifanten voeren',
            'created'       => date('Y-m-d H:i:s'),
            'created_by'    => 1,
        ],
        [
            'user_id'       => 2,
            'name'          => 'lezen',        
            'created'       => date('Y-m-d H:i:s'),
            'created_by'    => 2,
        ],
        [
            'user_id'       => 2,
            'name'          => 'programmeren',        
            'created'       => date('Y-m-d H:i:s'),
            'created_by'    => 1,
        ],
        [
            'user_id'       => 2,
            'name'          => 'korfbal',        
            'created'       => date('Y-m-d H:i:s'),
            'created_by'    => 2,
        ],
        [
            'user_id'       => 2,
            'name'          => 'hardlopen',        
            'created'       => date('Y-m-d H:i:s'),
            'created_by'    => 2,
        ],
        [
            'user_id'       => 3,
            'name'          => 'dammen',        
            'created'       => date('Y-m-d H:i:s'),
            'created_by'    => 3,
        ],
        [
            'user_id'       => 3,
            'name'          => 'saxofoon spelen',        
            'created'       => date('Y-m-d H:i:s'),
            'created_by'    => 3,
        ],
        [
            'user_id'       => 3,
            'name'          => 'zingen in een koor',        
            'created'       => date('Y-m-d H:i:s'),
            'created_by'    => 3,
        ],)
    ],
];