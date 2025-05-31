/** @type {import('next').NextConfig} */
const nextConfig = {
  eslint: {
    ignoreDuringBuilds: true,
  },
  typescript: {
    ignoreBuildErrors: true,
  },
  images: {
    domains: [
      "emby.media",
      "raw.githubusercontent.com",
      "cdn.worldvectorlogo.com",
      "upload.wikimedia.org",
      "global.download.synology.com",
      "tautulli.com",
      "www.themoviedb.org",
      "github.com",
      "hebbkx1anhila5yf.public.blob.vercel-storage.com",
      "www.paypalobjects.com",
      "styles.redditmedia.com",
      "www.telus.com",
      "www.rbcroyalbank.com",
      "secure.eqbank.ca",
      "www.speedtest.net",
      "cpanel.net",
    ],
    unoptimized: true,
  },
  experimental: {
    serverActions: true,
  },
}

module.exports = nextConfig
