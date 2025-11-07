# Railway Variable Troubleshooting

## Common Variable Issues

### Issue: Variables Not Resolving

If `${{MYSQLHOST}}` shows as literal text instead of the actual value:

**Solution 1: Verify Service Link**
1. Go to **Laravel App Service** → **Settings**
2. Check **"Service References"** section
3. Ensure MySQL service is listed
4. If not, click **"+ New"** → **"Add Reference"** → Select MySQL service

**Solution 2: Check Variable Names**
Railway MySQL variables are case-sensitive:
- ✅ `${{MYSQLHOST}}` (correct)
- ❌ `${{MYSQL_HOST}}` (wrong)
- ❌ `${{mysqlhost}}` (wrong)

**Solution 3: Use Direct Values (Temporary Test)**
If references don't work, test with direct values:
```bash
DB_HOST=${{RAILWAY_PRIVATE_DOMAIN}}
DB_DATABASE=railway
DB_USERNAME=root
DB_PASSWORD=${{MYSQL_ROOT_PASSWORD}}
```

### Issue: Working Directory

Railway builds from the repository root. The Dockerfile handles the working directory internally.

**Current Setup:**
- Dockerfile copies `src/` to `/var/www/html`
- Working directory in container: `/var/www/html`
- No Railway root directory needed (Dockerfile handles it)

**If you need to set root directory in Railway:**
1. Go to **Service Settings** → **Deploy**
2. Set **Root Directory** to empty (default) or leave blank
3. Railway will use the repository root

### Issue: MySQL Variables Not Available

**Check if MySQL service is linked:**
1. Go to **Laravel App Service** → **Variables**
2. Look for variables starting with `MYSQL*`
3. If you don't see them, the services aren't linked

**Link the services:**
1. In **Laravel App Service**, click **"+ New"** → **"Add Reference"**
2. Select your **MySQL service**
3. Railway will inject all MySQL variables automatically

### Issue: Variable Reference Syntax

Railway uses `${{VARIABLE_NAME}}` syntax (double curly braces).

**Correct:**
```bash
DB_HOST=${{MYSQLHOST}}
DB_DATABASE=${{MYSQLDATABASE}}
```

**Wrong:**
```bash
DB_HOST=$MYSQLHOST          # Single braces
DB_HOST={{MYSQLHOST}}        # Missing dollar sign
DB_HOST=${MYSQLHOST}         # Shell syntax (won't work)
```

## Verify Variables Are Set

### Check in Railway Dashboard

1. Go to **Laravel App Service** → **Variables**
2. You should see:
   - Your custom variables (APP_NAME, DB_CONNECTION, etc.)
   - MySQL variables (MYSQLHOST, MYSQLDATABASE, etc.) - if linked
   - Railway system variables (RAILWAY_PUBLIC_DOMAIN, etc.)

### Check Resolved Values

Variables with `${{}}` syntax are resolved at runtime. To see actual values:

1. Check **Railway Logs** - resolved values appear in logs
2. Use Railway CLI:
   ```bash
   railway variables
   ```
3. Add temporary debug output in startup script

## Quick Fix Checklist

- [ ] MySQL service is linked to Laravel app service
- [ ] Variable names use correct case (MYSQLHOST, not MYSQL_HOST)
- [ ] Variable syntax uses `${{}}` (double curly braces)
- [ ] All DB_* variables are set
- [ ] APP_KEY is set
- [ ] APP_URL uses `${{RAILWAY_PUBLIC_DOMAIN}}`

## Testing Variable Resolution

Add this to your startup script temporarily to debug:

```bash
echo "DB_HOST value: $DB_HOST"
echo "DB_DATABASE value: $DB_DATABASE"
echo "DB_USERNAME value: $DB_USERNAME"
```

This will show if variables are resolving correctly.

