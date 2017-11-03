<?php

include_once 'include/header.php';

?>

    <main>
        <!-- cerca libro -->
        <h2>Cerca nel catalogo della biblioteca</h2>
        <form class="form-horizontal">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Titolo libro</label>
                <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" placeholder="titolo libro">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Autore</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" placeholder="Autore">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Casa Editrice</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" placeholder="casa editrice">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">cerca</button>
                </div>
            </div>
        </form>

        <aside>

        </aside>

        <article>
            <section>

            </section>
        </article>
    </main>

<?php

include_once 'include/footer.php';

?>