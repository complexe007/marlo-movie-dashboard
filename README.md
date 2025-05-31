# 🎬 Marlo-Movie Dashboard - Next.js

Dashboard moderne pour gérer vos services de médias avec vérification de statut en temps réel et statistiques d'utilisation complètes.

## ✨ Fonctionnalités

### 🔍 **Vérification de statut en temps réel**
- ✅ Indicateurs visuels (🟢 en ligne / 🔴 hors ligne)
- ✅ Temps de réponse affiché
- ✅ Mise à jour automatique toutes les minutes
- ✅ Cache intelligent pour optimiser les performances

### 📊 **Statistiques d'utilisation avancées**
- ✅ Graphiques interactifs (Chart.js)
- ✅ Suivi de tous les clics sur les applications
- ✅ Classement des apps les plus utilisées
- ✅ Activité par jour et par heure
- ✅ Filtres par période (7, 30, 90 jours)

### 🎨 **Interface moderne**
- ✅ Design identique à l'original
- ✅ Responsive (mobile, tablette, desktop)
- ✅ Animations fluides
- ✅ Thème sombre avec accents dorés

## 🚀 Déploiement sur Vercel

### 1. **Prérequis**
- Compte Vercel
- Compte GitHub

### 2. **Configuration de la base de données**

#### Option A: Vercel Postgres (Recommandé)
\`\`\`bash
# Installer Vercel CLI
npm i -g vercel

# Se connecter à Vercel
vercel login

# Créer la base de données
vercel storage create postgres
\`\`\`

#### Option B: Supabase (Alternative gratuite)
1. Créez un compte sur [Supabase](https://supabase.com)
2. Créez un nouveau projet
3. Récupérez l'URL de connexion PostgreSQL

### 3. **Variables d'environnement**

Dans votre dashboard Vercel, ajoutez :

\`\`\`env
# Base de données (Vercel Postgres)
POSTGRES_URL="postgres://..."
POSTGRES_PRISMA_URL="postgres://..."
POSTGRES_URL_NON_POOLING="postgres://..."

# OU Base de données (Supabase)
DATABASE_URL="postgresql://..."

# Optionnel: Configuration Emby
NEXT_PUBLIC_EMBY_URL="http://74.210.253.59:8096"
NEXT_PUBLIC_EMBY_API_KEY="votre-cle-api"
\`\`\`

### 4. **Déploiement automatique**

1. **Forkez ce repository** sur GitHub
2. **Connectez Vercel** à votre repository
3. **Configurez les variables** d'environnement
4. **Déployez** automatiquement !

\`\`\`bash
# Ou déploiement manuel
git clone votre-repo
cd marlo-movie-dashboard
npm install
vercel --prod
\`\`\`

## 🛠️ Développement local

\`\`\`bash
# Installation
npm install

# Variables d'environnement
cp .env.example .env.local
# Éditez .env.local avec vos valeurs

# Développement
npm run dev

# Build de production
npm run build
npm start
\`\`\`

## 📁 Structure du projet

\`\`\`
/
├── app/
│   ├── page.tsx              # Page principale
│   ├── statistics/
│   │   └── page.tsx          # Page statistiques
│   ├── api/
│   │   ├── check-status/     # API vérification statut
│   │   ├── track-click/      # API suivi clics
│   │   └── statistics/       # API statistiques
│   ├── layout.tsx            # Layout principal
│   └── globals.css           # Styles globaux
├── components/
│   ├── AppCard.tsx           # Carte d'application
│   ├── Navigation.tsx        # Navigation
│   └── StatusOverview.tsx    # Vue d'ensemble des statuts
├── package.json
├── tailwind.config.js
└── next.config.js
\`\`\`

## 🎯 Personnalisation

### **Ajouter des applications**

Éditez `app/page.tsx` :

\`\`\`typescript
const apps = {
  votre_categorie: {
    name: 'Votre Catégorie',
    icon: 'fas-icon-name',
    items: [
      {
        name: 'Votre App',
        url: 'https://votre-url.com',
        logo: 'https://logo-url.png',
        color: '#couleur',
        description: 'Description'
      }
    ]
  }
}
\`\`\`

### **Modifier les couleurs**

Éditez `tailwind.config.js` :

\`\`\`javascript
theme: {
  extend: {
    colors: {
      'gold': '#votre-couleur',
      'gold-light': '#votre-couleur-claire',
    }
  }
}
\`\`\`

## 📊 Base de données

### **Tables automatiquement créées**

\`\`\`sql
-- Statistiques d'utilisation
CREATE TABLE usage_stats (
  id SERIAL PRIMARY KEY,
  app_name TEXT NOT NULL,
  app_url TEXT NOT NULL,
  category TEXT NOT NULL,
  click_date TIMESTAMP DEFAULT NOW(),
  ip_address TEXT,
  user_agent TEXT
);
\`\`\`

### **Nettoyage automatique**

Les données de plus de 90 jours sont automatiquement supprimées.

## 🔧 Configuration avancée

### **Timeout des vérifications**

Éditez `app/api/check-status/route.ts` :

\`\`\`typescript
const timeoutId = setTimeout(() => controller.abort(), 5000) // 5 secondes
\`\`\`

### **Fréquence de mise à jour**

Éditez `app/page.tsx` :

\`\`\`typescript
const interval = setInterval(loadStatuses, 60000) // 1 minute
\`\`\`

## 🐛 Dépannage

### **Erreurs de base de données**
\`\`\`bash
# Vérifier la connexion
vercel env ls

# Logs en temps réel
vercel logs --follow
\`\`\`

### **Problèmes de CORS**
Les vérifications de statut utilisent `fetch` côté serveur pour éviter les problèmes CORS.

### **Images qui ne se chargent pas**
Ajoutez les domaines dans `next.config.js` :

\`\`\`javascript
images: {
  domains: ['votre-domaine.com']
}
\`\`\`

## 📈 Performance

- ✅ **SSR/SSG** avec Next.js 14
- ✅ **Cache intelligent** pour les statuts
- ✅ **Optimisation des images** automatique
- ✅ **Lazy loading** des composants
- ✅ **Compression** automatique

## 🔒 Sécurité

- ✅ **Validation** des entrées utilisateur
- ✅ **Protection** contre les injections SQL
- ✅ **Headers** de sécurité automatiques
- ✅ **Rate limiting** intégré Vercel

## 🆕 Mises à jour

\`\`\`bash
# Mettre à jour les dépendances
npm update

# Redéployer
git push origin main
\`\`\`

## 📞 Support

- 📧 **Issues GitHub** pour les bugs
- 📖 **Documentation Vercel** : [vercel.com/docs](https://vercel.com/docs)
- 🚀 **Documentation Next.js** : [nextjs.org/docs](https://nextjs.org/docs)

---

## 🎉 **Votre dashboard est prêt pour Vercel !**

1. **Forkez** ce repository
2. **Connectez** à Vercel
3. **Configurez** la base de données
4. **Déployez** en un clic !

**URL de démo** : `https://votre-projet.vercel.app` 🚀
