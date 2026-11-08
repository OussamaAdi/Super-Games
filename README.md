# Super Games

A university project: a PHP and MySQL game store where users can sign up, log in, add games to a cart and move them to a library.

## Screenshots

**Home page**

![Home page with the featured games carousel](screenshots/image%20%2810%29.png)

**Game page**

![DOOM Eternal game page with screenshots and press reviews](screenshots/image%20%2811%29.png)

**News**

![News page showing new content for store games](screenshots/image%20%2812%29.png)

**Cart**

![Cart with three games ready to buy](screenshots/image%20%2813%29.png)

**Library**

![Library with owned games and their download buttons](screenshots/image%20%2814%29.png)

## Setup

1. Create an empty MySQL database (the default name is `Project`).
2. Import `sql/schema.sql` into it. This creates all the tables, with no data.
3. Import `sql/games.sql`. This adds the store's 17 games with their screenshots and reviews.
4. Copy `includes/config.example.php` to `includes/config.php` and fill in your database details. `includes/config.php` is git-ignored.

## Project layout

- Pages: `index.php`, `all.php`, `game.php?slug=...` (one page for every game), `cart.php`, `library.php`, `news.php`, `about.php`, `contact.php` and the account pages.
- `includes/`: shared code. `init.php` is loaded first by every page; `header.php` and `footer.php` wrap every page; `store.php` holds the cart and library logic. The folder can't be opened from the browser.
- `style.css` and `script.js`: the one stylesheet and script for every page.
- `sql/`: database structure and the games catalogue.

## Notes

- **Mock store, no real purchases.** The "Buy" button only moves a game from the cart to the library. There is no payment step, and that is intentional.
- **Download buttons are placeholders.** The library's "Download (demo)" buttons are disabled and do not download anything.
- **Educational project, not affiliated with any publisher.** All game names, art, logos and review quotes belong to their respective owners.
