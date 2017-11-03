<!-- chiusura container -->
</div>

    <footer>
    <div>
        <hr>
    </div>
    </footer>
   

    <!-- bootstrap e jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="lib/bootstrap-3.3.7/js/bootstrap.min.js"></script>

    <script>
        var login = localStorage.getItem('tessera');
        if(login==null){
        $('#logout').hide();
        }else{
        $('#logout').show();
        };

        $('#logout').on('click',function(){
            localStorage.removeItem('tessera');
            localStorage.removeItem('username');
            localStorage.removeItem('nome');
            localStorage.removeItem('cognome');
            location.href = '../index.php'
        })
    </script>
</body>
</html>