<?php
require_once 'includes/config.php';
require_once 'includes/database.php';
require_once 'includes/functions.php';

// Nettoyer les anciennes données (optionnel)
cleanOldStats();

// Récupérer les statistiques
$period = $_GET['period'] ?? '30 days';
$stats = getUsageStats($period);
$systemInfo = getSystemInfo();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques - Marlo-Movie Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <header class="header">
        <h1><i class="fas fa-chart-bar"></i> Statistiques d'utilisation</h1>
    </header>
    
    <nav class="nav">
        <a href="index.php" class="nav-item">
            <i class="fas fa-home"></i> Accueil
        </a>
        <a href="?period=7 days" class="nav-item <?php echo $period === '7 days' ? 'active' : ''; ?>">
            <i class="fas fa-calendar-week"></i> 7 jours
        </a>
        <a href="?period=30 days" class="nav-item <?php echo $period === '30 days' ? 'active' : ''; ?>">
            <i class="fas fa-calendar-alt"></i> 30 jours
        </a>
        <a href="?period=90 days" class="nav-item <?php echo $period === '90 days' ? 'active' : ''; ?>">
            <i class="fas fa-calendar"></i> 90 jours
        </a>
    </nav>
    
    <main class="main-content">
        <!-- Résumé des statistiques -->
        <div class="stats-summary">
            <div class="stat-card">
                <i class="fas fa-mouse-pointer"></i>
                <div class="stat-info">
                    <h3><?php echo array_sum(array_column($stats['apps'], 'click_count')); ?></h3>
                    <p>Clics totaux</p>
                </div>
            </div>
            <div class="stat-card">
                <i class="fas fa-apps"></i>
                <div class="stat-info">
                    <h3><?php echo count($stats['apps']); ?></h3>
                    <p>Applications utilisées</p>
                </div>
            </div>
            <div class="stat-card">
                <i class="fas fa-calendar-day"></i>
                <div class="stat-info">
                    <h3><?php echo count($stats['daily']); ?></h3>
                    <p>Jours d'activité</p>
                </div>
            </div>
        </div>
        
        <!-- Applications les plus utilisées -->
        <div class="chart-container">
            <h2><i class="fas fa-trophy"></i> Applications les plus utilisées</h2>
            <div class="apps-ranking">
                <?php foreach (array_slice($stats['apps'], 0, 10) as $index => $app): ?>
                <div class="ranking-item">
                    <span class="rank">#<?php echo $index + 1; ?></span>
                    <span class="app-name"><?php echo htmlspecialchars($app['app_name']); ?></span>
                    <span class="category"><?php echo htmlspecialchars($app['category']); ?></span>
                    <span class="clicks"><?php echo $app['click_count']; ?> clics</span>
                    <span class="last-used">Dernière utilisation: <?php echo date('d/m/Y H:i', strtotime($app['last_used'])); ?></span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        
        <!-- Graphique d'activité quotidienne -->
        <div class="chart-container">
            <h2><i class="fas fa-chart-line"></i> Activité quotidienne</h2>
            <canvas id="dailyChart" width="400" height="200"></canvas>
        </div>
        
        <!-- Graphique d'activité par heure -->
        <div class="chart-container">
            <h2><i class="fas fa-clock"></i> Activité par heure (7 derniers jours)</h2>
            <canvas id="hourlyChart" width="400" height="200"></canvas>
        </div>
        
        <!-- Informations système -->
        <div class="chart-container">
            <h2><i class="fas fa-server"></i> Informations système</h2>
            <div class="system-info">
                <div class="info-item">
                    <span class="label">Version PHP:</span>
                    <span class="value"><?php echo $systemInfo['php_version']; ?></span>
                </div>
                <div class="info-item">
                    <span class="label">Serveur:</span>
                    <span class="value"><?php echo $systemInfo['server_software']; ?></span>
                </div>
                <div class="info-item">
                    <span class="label">Mémoire utilisée:</span>
                    <span class="value"><?php echo $systemInfo['memory_usage']; ?></span>
                </div>
                <div class="info-item">
                    <span class="label">Pic mémoire:</span>
                    <span class="value"><?php echo $systemInfo['memory_peak']; ?></span>
                </div>
                <?php if (isset($systemInfo['disk_free'])): ?>
                <div class="info-item">
                    <span class="label">Espace libre:</span>
                    <span class="value"><?php echo $systemInfo['disk_free']; ?> / <?php echo $systemInfo['disk_total']; ?></span>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </main>
    
    <footer class="footer">
        <p>&copy; <?php echo date('Y'); ?> Marlo-Movie Dashboard</p>
    </footer>
    
    <script>
        // Graphique d'activité quotidienne
        const dailyData = <?php echo json_encode($stats['daily']); ?>;
        const dailyCtx = document.getElementById('dailyChart').getContext('2d');
        new Chart(dailyCtx, {
            type: 'line',
            data: {
                labels: dailyData.map(d => d.date),
                datasets: [{
                    label: 'Clics par jour',
                    data: dailyData.map(d => d.clicks),
                    borderColor: '#b8860b',
                    backgroundColor: 'rgba(184, 134, 11, 0.1)',
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: {
                            color: '#f5f5f5'
                        }
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            color: '#f5f5f5'
                        },
                        grid: {
                            color: 'rgba(245, 245, 245, 0.1)'
                        }
                    },
                    y: {
                        ticks: {
                            color: '#f5f5f5'
                        },
                        grid: {
                            color: 'rgba(245, 245, 245, 0.1)'
                        }
                    }
                }
            }
        });
        
        // Graphique d'activité par heure
        const hourlyData = <?php echo json_encode($stats['hourly']); ?>;
        const hourlyCtx = document.getElementById('hourlyChart').getContext('2d');
        new Chart(hourlyCtx, {
            type: 'bar',
            data: {
                labels: Array.from({length: 24}, (_, i) => i + 'h'),
                datasets: [{
                    label: 'Clics par heure',
                    data: Array.from({length: 24}, (_, i) => {
                        const hourData = hourlyData.find(h => parseInt(h.hour) === i);
                        return hourData ? hourData.clicks : 0;
                    }),
                    backgroundColor: 'rgba(184, 134, 11, 0.7)',
                    borderColor: '#b8860b',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: {
                            color: '#f5f5f5'
                        }
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            color: '#f5f5f5'
                        },
                        grid: {
                            color: 'rgba(245, 245, 245, 0.1)'
                        }
                    },
                    y: {
                        ticks: {
                            color: '#f5f5f5'
                        },
                        grid: {
                            color: 'rgba(245, 245, 245, 0.1)'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
