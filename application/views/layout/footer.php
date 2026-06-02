    </div> <!-- Close .app-content-wrapper -->

    <!-- Core Scripts -->
    <script src="<?= base_url(); ?>public/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>public/js/offcanvas.js"></script>
    <script src="<?= base_url(); ?>public/js/bootstrap-4-navbar.js"></script>

    <!-- Sidebar Animation and Toggle Script -->
    <script type="text/javascript">
        $(document).ready(function() {
            var $sidebar = $('#appSidebar');
            var $overlay = $('#sidebarOverlay');
            
            $('#sidebarToggleBtn').on('click', function() {
                $sidebar.addClass('open');
                $overlay.addClass('show');
            });
            
            $('#closeSidebarBtn, #sidebarOverlay').on('click', function() {
                $sidebar.removeClass('open');
                $overlay.removeClass('show');
            });

            // Dynamic global input masking for Telefone, CPF/CNPJ, and CEP
            $(document).on('input', 'input[name="telefone"], input#telefone', function() {
                var tel = $(this).val().replace(/\D/g, "");
                if (tel.length > 11) tel = tel.substring(0, 11);
                if (tel.length > 10) {
                    $(this).val(tel.replace(/^(\d{2})(\d{5})(\d{4})$/, "($1) $2-$3"));
                } else if (tel.length > 5) {
                    $(this).val(tel.replace(/^(\d{2})(\d{4})(\d{0,4})$/, "($1) $2-$3"));
                } else if (tel.length > 2) {
                    $(this).val(tel.replace(/^(\d{2})(\d{0,5})$/, "($1) $2"));
                } else if (tel.length > 0) {
                    $(this).val(tel.replace(/^(\d*)$/, "($1"));
                }
            });

            $(document).on('input', 'input[name="documento"], input#documento', function() {
                var doc = $(this).val().replace(/\D/g, "");
                var tipo = $('select[name="tipo_documento"], select#tipo_documento').val();
                
                if (!tipo) {
                    if (doc.length > 11) tipo = 'CNPJ';
                    else tipo = 'CPF';
                }
                
                if (tipo === 'CPF') {
                    if (doc.length > 11) doc = doc.substring(0, 11);
                    if (doc.length <= 11) {
                        var formatted = doc;
                        if (doc.length > 9) formatted = doc.replace(/^(\d{3})(\d{3})(\d{3})(\d{1,2})$/, "$1.$2.$3-$4");
                        else if (doc.length > 6) formatted = doc.replace(/^(\d{3})(\d{3})(\d{1,3})$/, "$1.$2.$3");
                        else if (doc.length > 3) formatted = doc.replace(/^(\d{3})(\d{1,3})$/, "$1.$2");
                        $(this).val(formatted);
                    }
                } else if (tipo === 'CNPJ' || tipo === 'PASSAPORTE') {
                    if (tipo === 'CNPJ') {
                        if (doc.length > 14) doc = doc.substring(0, 14);
                        if (doc.length <= 14) {
                            var formatted = doc;
                            if (doc.length > 12) formatted = doc.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{1,2})$/, "$1.$2.$3/$4-$5");
                            else if (doc.length > 8) formatted = doc.replace(/^(\d{2})(\d{3})(\d{3})(\d{1,4})$/, "$1.$2.$3/$4");
                            else if (doc.length > 5) formatted = doc.replace(/^(\d{2})(\d{3})(\d{1,3})$/, "$1.$2.$3");
                            else if (doc.length > 2) formatted = doc.replace(/^(\d{2})(\d{1,3})$/, "$1.$2");
                            $(this).val(formatted);
                        }
                    } else {
                        // Passaporte: alphanumeric 20 chars
                        var pass = $(this).val().replace(/[^a-zA-Z0-9]/g, "");
                        if (pass.length > 20) pass = pass.substring(0, 20);
                        $(this).val(pass.toUpperCase());
                    }
                }
            });
            
            $(document).on('change', 'select[name="tipo_documento"], select#tipo_documento', function() {
                $('input[name="documento"], input#documento').val('').trigger('input');
            });

            $(document).on('input', 'input[name="cep"], input#cep', function() {
                var cep = $(this).val().replace(/\D/g, "");
                if (cep.length > 8) cep = cep.substring(0, 8);
                if (cep.length > 5) {
                    $(this).val(cep.replace(/^(\d{5})(\d{1,3})$/, "$1-$2"));
                } else {
                    $(this).val(cep);
                }
            });
        });
    </script>
</body>
</html>
