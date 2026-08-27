        // BANNER ROTATIVO
        let bannerIndex = 0;
        const slides = document.querySelectorAll('.banner-slide');

        function rotateBanner() {
            if (slides.length === 0) return;
            slides.forEach(s => s.classList.remove('active'));
            bannerIndex = (bannerIndex + 1) % slides.length;
            slides[bannerIndex].classList.add('active');
        }
        if (slides.length > 0) {
            setInterval(rotateBanner, 5000);
        }

        // SCROLL SUAVE
        function scrollToSection(id) {
            const el = document.getElementById(id);
            if (!el) return;
            const header = document.querySelector('header');
            const headerHeight = header ? header.offsetHeight : 0;
            const top = el.getBoundingClientRect().top + window.scrollY - headerHeight + 5;
            window.scrollTo({ top, behavior: 'smooth' });
        }

        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', e => {
                const href = link.getAttribute('href');
                if (href && href.startsWith('#')) {
                    e.preventDefault();
                    scrollToSection(href.substring(1));
                }
            });
        });

        // MENU HAMBÚRGUER (Protegido contra erro nulo)
        const hamburgerBtn = document.getElementById('hamburger-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        if (hamburgerBtn && mobileMenu) {
            hamburgerBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('open');
                mobileMenu.style.maxHeight = mobileMenu.classList.contains('open')
                    ? mobileMenu.scrollHeight + 'px'
                    : '0';
            });

            mobileMenu.querySelectorAll('.nav-link').forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.remove('open');
                    mobileMenu.style.maxHeight = '0';
                });
            });
        }

        // RENDERIZAÇÃO DOS CARDS
        function criarCard(item) {
            const card = document.createElement('article');
            card.className = 'card';
            card.dataset.id = item.id;

            const img = document.createElement('img');
            img.src = item.poster || item.imagem || '';
            img.alt = item.title || item.nome || '';

            const content = document.createElement('div');
            content.className = 'card-content';

            const title = document.createElement('h3');
            title.className = 'card-title';
            title.textContent = item.title || item.nome || '';

            const meta1 = document.createElement('p');
            meta1.className = 'card-meta';
            meta1.innerHTML = `<span>${item.category || item.categoria || ''}</span><span>${item.year || item.ano || ''}</span>`;

            const meta2 = document.createElement('p');
            meta2.className = 'card-meta';
            meta2.textContent = item.duration || item.duracao || (item.temporadas ? `${item.temporadas} temp` : '');

            const ratingVal = parseFloat(item.rating || item.avaliacao || 0);
            const footer = document.createElement('p');
            footer.className = 'card-footer';
            footer.innerHTML = `<i class="fa-solid fa-star"></i> ${ratingVal.toFixed(1)} / 10`;

            content.appendChild(title);
            content.appendChild(meta1);
            content.appendChild(meta2);
            content.appendChild(footer);

            card.appendChild(img);
            card.appendChild(content);

            card.addEventListener('click', () => abrirModal(item));
            return card;
        }

        function renderizarMetal(lista) {
            const grid = document.getElementById('metal-grid');
            if (!grid) return;
            grid.innerHTML = '';
            lista.forEach(item => grid.appendChild(criarCard(item)));
            const counter = document.getElementById('total-metal');
            if (counter) counter.textContent = lista.length;
        }

        function renderizarRiders(lista) {
            const grid = document.getElementById('riders-grid');
            if (!grid) return;
            grid.innerHTML = '';
            lista.forEach(item => grid.appendChild(criarCard(item)));
            const counter = document.getElementById('total-riders');
            if (counter) counter.textContent = lista.length;
        }

        // MODAL
        const modalOverlay = document.getElementById('modal-overlay');
        const modal = document.getElementById('modal');
        const modalImage = document.getElementById('modal-image');
        const modalTitle = document.getElementById('modal-title');
        const modalMeta = document.getElementById('modal-meta');
        const modalRating = document.getElementById('modal-rating');
        const modalSynopsis = document.getElementById('modal-synopsis');
        const modalCloseBtn = document.getElementById('modal-close');

        function abrirModal(item) {
            if (!modalOverlay || !modal) return;

            modalImage.src = item.poster || item.imagem || '';
            modalTitle.textContent = item.title || item.nome || '';
            modalMeta.innerHTML = '';

            const tipoSpan = document.createElement('span');
            tipoSpan.textContent = item.tipo === 'rider' ? 'Kamen Rider' : 'Metal Hero';
            modalMeta.appendChild(tipoSpan);

            const catSpan = document.createElement('span');
            catSpan.textContent = item.category || item.categoria || '';
            modalMeta.appendChild(catSpan);

            const anoSpan = document.createElement('span');
            anoSpan.textContent = item.year || item.ano || '';
            modalMeta.appendChild(anoSpan);

            const ratingVal = parseFloat(item.rating || item.avaliacao || 0);
            modalRating.innerHTML = `<i class="fa-solid fa-star"></i> Avaliação: ${ratingVal.toFixed(1)} / 10`;
            modalSynopsis.textContent = item.synopsis || item.sinopse || '';

            modalOverlay.classList.add('active');
            modal.classList.add('active');
        }

        function fecharModal() {
            if (modalOverlay && modal) {
                modalOverlay.classList.remove('active');
                modal.classList.remove('active');
            }
        }

        if (modalCloseBtn) modalCloseBtn.addEventListener('click', fecharModal);
        if (modalOverlay) {
            modalOverlay.addEventListener('click', e => {
                if (e.target === modalOverlay) fecharModal();
            });
        }
        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') fecharModal();
        });
        
        // =========================
        // BUSCA / FILTRO
        // =========================
        const searchMetalInput = document.getElementById('search-metal');
        const searchRidersInput = document.getElementById('search-riders');

        searchMetalInput.addEventListener('input', () => {
            const termo = searchMetalInput.value.toLowerCase().trim();
            const filtrados = metalHeros.filter(item =>
                item.nome.toLowerCase().includes(termo) ||
                item.categoria.toLowerCase().includes(termo)
            );
            renderizarMetal(filtrados);
        });

        searchRidersInput.addEventListener('input', () => {
            const termo = searchRidersInput.value.toLowerCase().trim();
            const filtrados = kamenRiders.filter(item =>
                item.nome.toLowerCase().includes(termo) ||
                item.categoria.toLowerCase().includes(termo)
            );
            renderizarRiders(filtrados);
        });

        // =========================
        // BOTÃO VOLTAR AO TOPO
        // =========================
        const backToTopBtn = document.getElementById('back-to-top');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 400) backToTopBtn.classList.add('visible');
            else backToTopBtn.classList.remove('visible');
        });
        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({ top:0, behavior:'smooth' });
        });

        // =========================
        // VALIDAÇÕES FORMULÁRIOS
        // =========================
        function validarEmail(email) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }

        const cadastroForm = document.getElementById('cadastro-form');
        const cadastroMsg = document.getElementById('cadastro-mensagem');
        cadastroForm.addEventListener('submit', e => {
            e.preventDefault();
            const nome = document.getElementById('cadastro-nome').value.trim();
            const email = document.getElementById('cadastro-email').value.trim();
            const senha = document.getElementById('cadastro-senha').value;
            const confirmar = document.getElementById('cadastro-confirmar').value;

            cadastroMsg.textContent = '';
            cadastroMsg.className = 'message';

            if (!nome || !email || !senha || !confirmar) {
                cadastroMsg.textContent = 'Preencha todos os campos.';
                cadastroMsg.classList.add('error');
                return;
            }
            if (!validarEmail(email)) {
                cadastroMsg.textContent = 'E-mail inválido.';
                cadastroMsg.classList.add('error');
                return;
            }
            if (senha.length < 6) {
                cadastroMsg.textContent = 'Senha deve ter pelo menos 6 caracteres.';
                cadastroMsg.classList.add('error');
                return;
            }
            if (senha !== confirmar) {
                cadastroMsg.textContent = 'Senha e confirmação não coincidem.';
                cadastroMsg.classList.add('error');
                return;
            }
            cadastroMsg.textContent = 'Cadastro realizado com sucesso!';
            cadastroMsg.classList.add('success');
            cadastroForm.reset();
        });

        const loginForm = document.getElementById('login-form');
        const loginMsg = document.getElementById('login-mensagem');
        loginForm.addEventListener('submit', e => {
            e.preventDefault();
            const email = document.getElementById('login-email').value.trim();
            const senha = document.getElementById('login-senha').value;

            loginMsg.textContent = '';
            loginMsg.className = 'message';

            if (!email || !senha) {
                loginMsg.textContent = 'Preencha e-mail e senha.';
                loginMsg.classList.add('error');
                return;
            }
            if (!validarEmail(email)) {
                loginMsg.textContent = 'E-mail inválido.';
                loginMsg.classList.add('error');
                return;
            }
            if (senha.length < 6) {
                loginMsg.textContent = 'Senha muito curta.';
                loginMsg.classList.add('error');
                return;
            }
            loginMsg.textContent = 'Login realizado com sucesso! (simulação).';
            loginMsg.classList.add('success');
            loginForm.reset();
        });

        const contatoForm = document.getElementById('contato-form');
        const contatoStatus = document.getElementById('contato-mensagem-status');
        contatoForm.addEventListener('submit', e => {
            e.preventDefault();
            const nome = document.getElementById('contato-nome').value.trim();
            const email = document.getElementById('contato-email').value.trim();
            const msg = document.getElementById('contato-mensagem').value.trim();

            contatoStatus.textContent = '';
            contatoStatus.className = 'message';

            if (!nome || !email || !msg) {
                contatoStatus.textContent = 'Preencha todos os campos.';
                contatoStatus.classList.add('error');
                return;
            }
            if (!validarEmail(email)) {
                contatoStatus.textContent = 'E-mail inválido.';
                contatoStatus.classList.add('error');
                return;
            }
            contatoStatus.textContent = 'Mensagem enviada com sucesso!';
            contatoStatus.classList.add('success');
            contatoForm.reset();
        });

        // =========================
        // INICIALIZAÇÃO
        // =========================
        document.addEventListener('DOMContentLoaded', () => {
            renderizarMetal(metalHeros);
            renderizarRiders(kamenRiders);
        });