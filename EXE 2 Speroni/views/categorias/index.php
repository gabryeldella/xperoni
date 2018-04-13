
<?php //include 'perfil.php' ?>

<h1> Categorias </h1>
<meta charset="utf-8"
 <nav id="menu">
     <ul>
         
         <?php foreach ($categorias as $categoria): ?>
                <li>
                    <td scope="row"><?= $categoria->getId()?></td>
                    <td>
                        <a href="?action=show&id=<?= $categoria->getId() ?>">
                            <?= $categoria->getNome()?>
                        </a>
                    </td>
                </li>
            <?php endforeach; ?>     
    </ul>
 </nav>
<br> 
<form action="produtos.php" method="post">
    <label for="busca">Busca</label>
    <input type="text"   placeholder="Buscar" name="busca" id="busca" />
    <input type="submit" name="Enviar" />
</form>
<br>
</html>

