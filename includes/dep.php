<?php
session_start();

?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="icon" href="/assets/favicon2.PNG">
<script src="/dist/toasteur.min.js"></script>
<link rel="stylesheet" href="/dist/themes/toasteur-default.min.css">
<script>
    function createsuccess(txt) {
        new Toasteur().success(txt, 'Success!')
    }
    function createerror(txt) {
        new Toasteur().error(txt, 'Erreur !')
    }
</script>
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    clifford: '#da373d',
                    dev: '#245348'
                }
            }

        }
    }
</script>