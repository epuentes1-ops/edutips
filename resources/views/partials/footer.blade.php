<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: 'Segoe UI', sans-serif;
    }

    .footer {
        background-color: #3b3f44;
        color: #fff;
        padding: 40px 20px;
    }

    .footer-top {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 10px;
    }

    .footer-column {
        flex: 1 1 240px;
        min-width: 240px;
        border-right: 1px solid #777;
        padding: 10px;
    }

    .footer-column.small {
        flex: 1 1 240px;
        min-width: 240px;
        border-right: 1px solid #777;
        padding: 10px;
    }

    .footer-column.large {
        flex: 2 1 300px;
    }

    .footer-column h4 {
        color: #ff9900;
        margin-bottom: 10px;
    }

    .footer-column p,
    .footer-column a {
        color: #ccc;
        font-size: 13px;
        text-decoration: none;
        line-height: 1.6;
    }

    .footer-column.small a {
        color: #ccc;
        font-size: 10px;
        text-decoration: none;
        line-height: 1.6;
    }

    .footer-column a:hover {
        text-decoration: underline;
    }

    .important-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .important-links li {
        margin-bottom: 8px;
    }

    .btn-trabaja {
        background-color: #ff9900;
        color: white;
        padding: 8px 12px;
        border-radius: 4px;
        display: inline-block;
        margin-top: 10px;
    }

    .icontec-certifications {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .icontec-certifications img {
        width: 100px;
        height: auto;
    }

    .social-icons {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-bottom: 20px;
    }

    .social-icons img {
        width: 30px;
        height: auto;
    }

    .footer-bottom {
        text-align: center;
        margin-top: 30px;
        font-size: 0.85em;
        border-top: 1px solid #555;
        padding-top: 20px;
        color: #aaa;
    }

    .floating-buttons {
        position: fixed;
        right: 15px;
        bottom: 15px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        z-index: 1000;
    }

    .floating-buttons a {
        background: #25D366;
        color: white;
        font-size: 20px;
        width: 45px;
        height: 45px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        text-decoration: none;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }

    .floating-buttons .btn-chat {
        background: #ff5722;
    }

    .footer-column:last-child {

        border: 0 !important;

        @media (max-width: 768px) {

            .footer-column,
            .footer-bottom,
            .footer-column h4,
            .footer-column p,
            .footer-column a,
            .footer-column ul,
            .footer-column li {
                text-align: center;
            }

            .footer-top {
                flex-direction: column;
                gap: 40px;
            }

            .footer-column,
            .footer-column.small,
            .footer-column.large {
                flex: 1 1 100%;
            }

            .icontec-certifications {
                justify-content: center;
            }

            .social-icons {
                justify-content: center;
            }

            .floating-buttons {
                right: 10px;
                bottom: 10px;
            }

            .icontec-certifications img {
                width: 150px;
                height: auto;
            }

        }
</style>


<footer class="footer">
    <div class="footer-top">
        <!-- Columna 1 -->
        <div class="footer-column small">
            <img src="https://ucompensar.edu.co/wp-content/uploads/2021/09/Logo-Fundacion-Universitaria-compensar.svg"
                alt="Logo Fundación Universitaria Compensar" style="max-width: 200px; margin-bottom: 15px;">
            <p>
                Fundación Universitaria Compensar P.J. Resolución 23635 del 23 diciembre 1981 | 12455 del 9 de julio
                2020. – VIGILADA MINEDUCACIÓN<br><br>
                Para requerimientos de autoridades, tutelas o notificaciones judiciales por favor dirigirse al
                correo:<br>
                <a href="mailto:notificacionesjudiciales@ucompensar.edu.co">notificacionesjudiciales@ucompensar.edu.co</a>
            </p>
        </div>

        <!-- Columna 2 -->
        <div class="footer-column">
            <h4>Bogotá</h4>
            <p>Sede principal<br>Avenida (Calle) 32 No. 17 – 30<br>Teléfono: 601 338 06 66</p>

            <h4>Campus Av. 68</h4>
            <p>Av. Carrera 68<br>No. 68 B – 45</p>

            <h4>Villavicencio</h4>
            <p>Cra. 33 #39-55</p>
        </div>

        <!-- Columna 3 -->
        <div class="footer-column">
            <div class="icontec-certifications">
                <a href="https://ucompensar.edu.co/wp-content/uploads/2024/12/FUNDACION-UNIVERSITARIA-COMPENSAR-UCOMPENSAR-9001-2024-11-06.pdf"
                    target="_blank">
                    <img src="https://ucompensar.edu.co/wp-content/uploads/2025/10/440986-2.webp"
                        alt="Certificación ISO 9001">
                </a>
                <a href="https://ucompensar.edu.co/wp-content/uploads/2024/12/FUNDACION-UNIVERSITARIA-COMPENSAR-UCOMPENSAR-5555-2024-11-06.pdf"
                    target="_blank">
                    <img src="https://ucompensar.edu.co/wp-content/uploads/2025/10/728684-2.webp"
                        alt="Certificación NTC 5555">
                </a>
                <a href="https://ucompensar.edu.co/wp-content/uploads/2024/12/FUNDACION-UNIVERSITARIA-COMPENSAR-CS-CER728688-Cert.pdf"
                    target="_blank">
                    <img src="https://ucompensar.edu.co/wp-content/uploads/2025/10/728688.webp"
                        alt="Certificación NTC 5666">
                </a>
                <a href="https://ucompensar.edu.co/wp-content/uploads/2024/12/FUNDACION-UNIVERSITARIA-COMPENSAR-CS-CER1075680-Cert.pdf"
                    target="_blank">
                    <img src="https://ucompensar.edu.co/wp-content/uploads/2025/10/1075680.webp"
                        alt="Certificación NTC 5581">
                </a>
            </div>
        </div>

        <!-- Columna 4 -->
        <div class="footer-column">
            <h4>Síguenos</h4>
            <div class="social-icons">
                <a href="https://www.facebook.com/UCompensar/" target="_blank"><img
                        src="https://ucompensar.edu.co/wp-content/uploads/2025/02/redes-footer-facebook.webp"
                        alt="Facebook"></a>
                <a href="https://www.instagram.com/ucompensar/" target="_blank"><img
                        src="https://ucompensar.edu.co/wp-content/uploads/2025/02/redes-footer-instagram.webp"
                        alt="Instagram"></a>
                <a href="https://www.linkedin.com/school/fundación-universitaria-compensar" target="_blank"><img
                        src="https://ucompensar.edu.co/wp-content/uploads/2025/02/redes-footer-linkedin.webp"
                        alt="LinkedIn"></a>
                <a href="https://www.tiktok.com/@ucompensar" target="_blank"><img
                        src="https://ucompensar.edu.co/wp-content/uploads/2025/02/redes-footer-tiktok.webp"
                        alt="TikTok"></a>
                <a href="https://www.youtube.com/channel/UCfzWXgwqgfFbAGHtoUVMGnA" target="_blank"><img
                        src="https://ucompensar.edu.co/wp-content/uploads/2025/02/redes-footer-youtube.webp"
                        alt="YouTube"></a>
            </div>

            <h4>Links importantes</h4>
            <ul class="important-links">
                <li><a href="https://ucompensar.edu.co/documentos-de-interes/" target="_blank">Documentos de Interés</a>
                </li>
                <li><a href="https://recurso.ucompensar.edu.co/Servicio/saleForceWebToCase/src/PQRSF.html"
                        target="_blank">Radica tus PQR</a></li>
                <li><a href="https://ucompensar.edu.co/regimen-tributario-especial/" target="_blank">Régimen Tributario
                        Especial</a></li>
                <li><a href="https://ucompensar.edu.co/pdf/documentos/POL-PAJ-02-V08-Tratamiento-de-datos-personales.pdf?pid=18895"
                        target="_blank">Aviso de privacidad</a></li>
                <li><a href="https://www.elempleo.com/co/sitio-empresarial/ucompensar" target="_blank"
                        class="btn-trabaja">Trabaja con Nosotros</a></li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <p>© Fundación Universitaria Compensar - Todos los derechos reservados</p>
    </div>

    </footer>

        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
