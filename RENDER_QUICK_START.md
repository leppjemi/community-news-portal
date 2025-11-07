# Render Quick Start Guide

## 🚀 Deploy in 5 Minutes

### 1. Sign Up & Connect GitHub

1. Go to https://render.com
2. Sign up with GitHub
3. Click **"New +"** → **"Web Service"**
4. Connect your `community-news-portal` repository

### 2. Render Auto-Detects Configuration

Render will automatically detect:
- ✅ `render.yaml` file
- ✅ Dockerfile
- ✅ Health check endpoint (`/health`)

### 3. Add Database

1. Click **"New +"** → **"PostgreSQL"**
2. Name: `community-news-db`
3. Plan: **Starter** (free)
4. Render auto-links it to your web service

### 4. Deploy!

Click **"Create Web Service"** and Render will:
- Build your Docker image
- Deploy your app
- Run health checks
- Give you a live URL

## ⚙️ Manual Configuration (If Needed)

If auto-detection doesn't work, configure manually:

**Service Settings:**
- **Name:** `community-news-portal`
- **Environment:** `Docker`
- **Dockerfile Path:** `Dockerfile`
- **Health Check Path:** `/health`
- **Plan:** Starter (free) or Standard ($7/month)

**Environment Variables:**
Render auto-populates from `render.yaml`, but verify:
- `APP_KEY` is generated automatically
- Database variables are linked from PostgreSQL service

## 🔄 Switching from MySQL to PostgreSQL

Your app uses MySQL on Railway. Render's free tier uses PostgreSQL. Options:

### Option A: Use PostgreSQL (Easiest)

Laravel supports PostgreSQL! Just update one variable:
```bash
DB_CONNECTION=pgsql  # Change from mysql to pgsql
```

Your migrations should work as-is (Laravel handles the differences).

### Option B: Keep MySQL

Use an external MySQL service:
- PlanetScale (free tier available)
- Aiven (free trial)
- Or upgrade Render to paid plan for MySQL

Then update `render.yaml` with MySQL connection details.

## ✅ Verify Deployment

After deployment, check:
1. ✅ Health check passes (`/health` returns 200)
2. ✅ Homepage loads
3. ✅ Database migrations ran (check logs)
4. ✅ No 502 errors

## 🆘 Common Issues

**Health check failing?**
- Check Render logs for startup messages
- Verify Nginx is listening on correct port
- Ensure `/health` endpoint is accessible

**Database connection error?**
- Verify PostgreSQL service is linked
- Check `DB_CONNECTION=pgsql` is set
- Ensure database variables are populated

**Build failing?**
- Check Dockerfile is in root
- Verify all dependencies are installed
- Check build logs for specific errors

## 📞 Need Help?

- Render Docs: https://render.com/docs
- Render Support: support@render.com
- Laravel on Render: https://render.com/docs/deploy-laravel

