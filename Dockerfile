# Gunakan image resmi PHP CLI
FROM php:8.2-cli


# Set working directory
WORKDIR /app


# Salin semua file proyek
COPY . /app


# Expose port 7860 (standar di Spaces)
EXPOSE 7860


# Jalankan server PHP built-in dan layani dokumen dari /app
CMD ["php", "-S", "0.0.0.0:7860", "-t", "/app"]
