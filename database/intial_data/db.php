<?php

return <<<'SQL'
INSERT INTO
    `trips` (
        `id`,
        `source`,
        `destination`,
        `created_at`,
        `updated_at`
    )
VALUES
    (
        1,
        'Cairo',
        'Asyut',
        '2023-03-10 18:18:15',
        '2023-03-10 18:18:15'
    );

INSERT INTO
    `users` (
        `id`,
        `name`,
        `email`,
        `email_verified_at`,
        `password`,
        `remember_token`,
        `created_at`,
        `updated_at`
    )
VALUES
    (
        1,
        'Mohamed Fathi',
        'mohamedkdr66@gmail.com',
        NULL,
        '$2y$10$0aOjlo.oWabQ75uysdWsfu6jVWkOCnECvquV409ssT24wasugpHdy',
        NULL,
        '2023-03-10 18:18:07',
        '2023-03-10 18:18:07'
    );

INSERT INTO
    `buses` (
        `id`,
        `code`,
        `name`,
        `trip_id`,
        `created_at`,
        `updated_at`
    )
VALUES
    (
        1,
        '3255',
        'Bus_640b90876f3ad',
        1,
        '2023-03-10 18:18:15',
        '2023-03-10 18:18:15'
    );

INSERT INTO
    `seats` (
        `id`,
        `bus_id`,
        `code`,
        `created_at`,
        `updated_at`
    )
VALUES
    (
        1,
        1,
        '705017',
        '2023-03-10 18:18:15',
        '2023-03-10 18:18:15'
    ),
    (
        2,
        1,
        '015851',
        '2023-03-10 18:18:15',
        '2023-03-10 18:18:15'
    ),
    (
        3,
        1,
        '582910',
        '2023-03-10 18:18:15',
        '2023-03-10 18:18:15'
    ),
    (
        4,
        1,
        '591488',
        '2023-03-10 18:18:15',
        '2023-03-10 18:18:15'
    ),
    (
        5,
        1,
        '985626',
        '2023-03-10 18:18:15',
        '2023-03-10 18:18:15'
    ),
    (
        6,
        1,
        '350226',
        '2023-03-10 18:18:15',
        '2023-03-10 18:18:15'
    ),
    (
        7,
        1,
        '580078',
        '2023-03-10 18:18:15',
        '2023-03-10 18:18:15'
    ),
    (
        8,
        1,
        '162982',
        '2023-03-10 18:18:15',
        '2023-03-10 18:18:15'
    ),
    (
        9,
        1,
        '297824',
        '2023-03-10 18:18:15',
        '2023-03-10 18:18:15'
    ),
    (
        10,
        1,
        '025106',
        '2023-03-10 18:18:15',
        '2023-03-10 18:18:15'
    ),
    (
        11,
        1,
        '306157',
        '2023-03-10 18:18:15',
        '2023-03-10 18:18:15'
    ),
    (
        12,
        1,
        '392491',
        '2023-03-10 18:18:15',
        '2023-03-10 18:18:15'
    ),
    (
        13,
        1,
        '847092',
        '2023-03-10 18:18:15',
        '2023-03-10 18:18:15'
    );

INSERT INTO
    `stations` (
        `id`,
        `trip_id`,
        `source`,
        `destination`,
        `created_at`,
        `updated_at`
    )
VALUES
    (
        1,
        1,
        'Cairo',
        'AlFayyum',
        '2023-03-10 18:18:15',
        '2023-03-10 18:18:15'
    ),
    (
        2,
        1,
        'Cairo',
        'AlMinya',
        '2023-03-10 18:18:15',
        '2023-03-10 18:18:15'
    ),
    (
        3,
        1,
        'Cairo',
        'Asyut',
        '2023-03-10 18:18:15',
        '2023-03-10 18:18:15'
    ),
    (
        4,
        1,
        'AlFayyum',
        'Cairo',
        '2023-03-10 18:18:15',
        '2023-03-10 18:18:15'
    ),
    (
        5,
        1,
        'AlFayyum',
        'AlMinya',
        '2023-03-10 18:18:15',
        '2023-03-10 18:18:15'
    ),
    (
        6,
        1,
        'AlFayyum',
        'Asyut',
        '2023-03-10 18:18:15',
        '2023-03-10 18:18:15'
    ),
    (
        7,
        1,
        'AlMinya',
        'Cairo',
        '2023-03-10 18:18:15',
        '2023-03-10 18:18:15'
    ),
    (
        8,
        1,
        'AlMinya',
        'AlFayyum',
        '2023-03-10 18:18:15',
        '2023-03-10 18:18:15'
    ),
    (
        9,
        1,
        'AlMinya',
        'Asyut',
        '2023-03-10 18:18:15',
        '2023-03-10 18:18:15'
    ),
    (
        10,
        1,
        'Asyut',
        'Cairo',
        '2023-03-10 18:18:15',
        '2023-03-10 18:18:15'
    ),
    (
        11,
        1,
        'Asyut',
        'AlFayyum',
        '2023-03-10 18:18:15',
        '2023-03-10 18:18:15'
    ),
    (
        12,
        1,
        'Asyut',
        'AlMinya',
        '2023-03-10 18:18:15',
        '2023-03-10 18:18:15'
    );
SQL;
