@extends('layouts.appN')

@section('title', 'Paramètres')

@section('content')
    <div class="container" id="darkModeToggle">
        <!-- Section Profils -->
        <div id="profiles" class="section-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Profiles</h2>
                    <div class="profile-details">
                        <div class="profile-initial-circle">
                            <span class="profile-initial">{{ substr($name, 0, 1) }}</span>
                        </div>
                        <p>Nom d'utilisateur : {{ $name }}</p>
                        <p>Email : {{ $email }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Dark Mode -->
        <div id="darkModeSection" class="section-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Dark mode</h2>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="darkModeToggle">
                        <label class="form-check-label" for="darkModeToggle">Activer le mode sombre</label>
                    </div>
                </div>
            </div>
        </div>
        <!-- Section Abonnement -->
        <div id="subscription" class="section-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Abonnement</h2>
                    <div class="subscription-section">
                        <p class="subscription-status">
                            @if ($subscriptionStatus === 'active')
                                Votre abonnement est actif. Profitez de tous les avantages !
                            @elseif ($subscriptionStatus === 'expired')
                                Votre abonnement a expiré. Renouvelez-le pour continuer à bénéficier de nos services.
                            @elseif ($subscriptionStatus === 'pending')
                                Votre abonnement est en attente de paiement. Veuillez effectuer le paiement pour activer
                                votre abonnement.
                            @else
                                État d'abonnement inconnu
                            @endif
                        </p>
                        <p class="subscription-details">
                            Date de début : {{ $subscriptionStartDate }} <br>
                            Date d'expiration : {{ $subscriptionEndDate }} <br>
                            Type d'abonnement : {{ $subscriptionType }} <br>
                            Fonctionnalités incluses : {{ $subscriptionFeatures }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Langues -->
        <div id="languages" class="section-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Langues</h2>
                    <div class="languages-section">
                        <h3>Choisissez votre langue préférée :</h3>
                        <form action="{{ route('languages.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="language-select-container">
                                <label for="language-select" class="form-label">Langue préférée :</label>
                                <select name="language" id="language-select" class="form-select">
                                    <option value="english" {{ $preferredLanguage === 'english' ? 'selected' : '' }}>Anglais
                                    </option>
                                    <option value="french" {{ $preferredLanguage === 'french' ? 'selected' : '' }}>Français
                                    </option>
                                    <!-- Ajoutez d'autres langues au besoin -->
                                </select>
                            </div><br>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- JavaScript to toggle dark mode -->
        <script>
            const darkModeToggle = document.getElementById('darkModeToggle');
            const body = document.body;

            darkModeToggle.addEventListener('change', () => {
                body.classList.toggle('dark-mode');
            });
        </script>

        <!-- CSS for dark mode -->
        <style>
            .dark-mode {
                background-color: #333;
                color: #fff;
            }

            .profile-initial-circle {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                background-color: #300ab8;
                color: #fff;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 20px;
                font-weight: bold;
                margin-right: 10px;
            }

            .profile-initial {
                font-size: 18px;
                font-weight: bold;
            }
        </style>
    </div>
@endsection
