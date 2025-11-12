# BizBud Consultancy Website

A PHP/MySQL web application for booking consultancy appointments. The project ships with a simple admin dashboard for reviewing bookings and a public marketing site with appointment scheduling.

## Project Structure
- `index.php` – marketing homepage
- `appointment.php` – client booking experience
- `admin.php` / `admin_view_appointments.php` – admin dashboard
- `submit_appointment.php` / `get_available_slots.php` – JSON endpoints for appointment workflow
- `db_connect.php` – centralised database connection using environment variables
- `Dockerfile` – optional container image definition for local testing or custom Railway deploys

## Local Development
1. Import `webprojects2.sql` into a local MySQL instance.
2. Update the credentials in `db_connect.php` (the local fallback section) if they differ from the defaults (`root` / `1234@`).
3. Serve the project from a PHP-capable web server (XAMPP, Laravel Valet, Docker, etc.).

## Deploying to Railway
1. **Provision MySQL**: In Railway, create a new MySQL service. Enable the public connection and note the host, port, database, username, and password.
2. **Set Environment Variables** on the Railway web service:
   - `DB_HOST`
   - `DB_PORT`
   - `DB_NAME`
   - `DB_USER`
   - `DB_PASS`
   (Railway automatically provides `MYSQLHOST`, `MYSQLPORT`, etc., which are also supported by `db_connect.php`.)
3. **Create the appointments table** (once per environment):
   ```sql
   CREATE TABLE appointments (
       id INT AUTO_INCREMENT PRIMARY KEY,
       client_name VARCHAR(255) NOT NULL,
       client_email VARCHAR(255) NOT NULL,
       client_phone VARCHAR(20),
       appointment_date DATE NOT NULL,
       appointment_time TIME NOT NULL,
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
       UNIQUE KEY unique_appointment (appointment_date, appointment_time)
   );
   ```
4. **Deploy**: Connect the repository to Railway and trigger a deploy. Nixpacks detects the PHP code automatically; alternatively, select the Dockerfile deploy method.

## Admin Access
- Visit `/login.php` for the admin login.
- Default credentials (stored in `login.php`): `admin` / `password123`.
- On successful login, the dashboard is available at `/admin.php`.

## Environment Variables Reference
`db_connect.php` will attempt the following sources in order:
1. `DB_HOST`, `DB_NAME`, `DB_USER`, `DB_PASS`, `DB_PORT`
2. Railway defaults: `MYSQLHOST`, `MYSQLDATABASE`, `MYSQLUSER`, `MYSQLPASSWORD`, `MYSQLPORT`
3. Platform.sh relationship JSON (legacy support)
4. Local fallback: `localhost` / `webprojects2`

## Housekeeping
- Production secrets should never be committed to the repository.
- Remove the Dockerfile if you elect to use the default PHP Nixpack on Railway.
- Run `git status` before each commit to confirm no sensitive files are staged.
