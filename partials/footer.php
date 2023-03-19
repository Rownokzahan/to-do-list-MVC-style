    </section>
    </main>
    <footer class="text-center mt-16">
        © copyright <?php echo date("Y"); ?> by Rownok, all right reserved
    </footer>

    <script>
        const htmlElement = document.querySelector('html');

        document.addEventListener('DOMContentLoaded', function() {
            displayTheme();
        });

        function displayTheme(){
            if(!localStorage.getItem('theme')){
                localStorage.setItem('theme', htmlElement.getAttribute('data-theme'));
                return;
            }
            htmlElement.setAttribute('data-theme', localStorage.getItem('theme'));
        }

        function changeTheme(theme) {            
            htmlElement.setAttribute('data-theme', localStorage.getItem('theme'));
            localStorage.setItem('theme', theme);
            displayTheme();
        }
    </script>
    </body>

    </html>