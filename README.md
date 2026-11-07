# Super Games

A university project: a PHP and MySQL game store where users can sign up, log in, add games to a cart and move them to a library.

## Setup

1. Create an empty MySQL database (the default name is `Project`).
2. Import `sql/schema.sql` into it. This creates all the tables, with no data.
3. Copy `config.example.php` to `config.php` and fill in your database details. `config.php` is git-ignored.

Already set up from an older version? Your database just needs the newer `login_attempts` table: run `sql/login_attempts.sql` instead of step 2.

## Notes

- **Mock store, no real purchases.** The "Buy" button only moves a game from the cart to the library. There is no payment step, and that is intentional.
- **Download buttons are placeholders.** The library's "Download (demo)" buttons are disabled and do not download anything.
- **Educational project, not affiliated with any publisher.** All game names, art, logos and review quotes belong to their respective owners.
