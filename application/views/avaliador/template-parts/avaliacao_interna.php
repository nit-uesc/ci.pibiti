<ul class="collapsible" data-collapsible="accordion">
  <li>
    <div class="collapsible-header item-avaliacao grey-text" onclick="itemOpen(this)">
      <i class="material-icons" id="status<?= $projeto->proj_id ?>">hourglass_empty</i>
      <span class="titulo"><?= $projeto->proj_titulo != '' ? $projeto->proj_titulo : 'Título não informado' ?></span>
      <br>
      <i class="material-icons grey-text arrow">keyboard_arrow_down</i>
      <span class="grey-text">Pontuação: </span>
      <span class="grey-text" id="pontuacao<?php echo $projeto->proj_id ?>">0</span>
    </div>
    <div class="collapsible-body">
      <p>
        Orientador: <a href="<?= $projeto->link_lattes ?>"><?php echo $projeto->doc_nome; ?></a> </br>
        Projeto: <a href="<?php echo base_url('uploads/'.$projeto->proj_arquivo);?>"><?= $projeto->proj_titulo != '' ? $projeto->proj_titulo : 'Título não informado' ?></a>
      </p>
      <form class="avaliacao collapsible-table" id="<?php echo $projeto->proj_id ?>" method="post" action="<?php echo base_url('');?>" onchange="save(<?php echo $projeto->proj_id ?>)">
        <table>
          <thead>
            <tr>
              <th>Escolha</th>
              <th>Critério do projeto</th>
              <th>Pontuação</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <input class="criterio_projeto" name="criterio<?php echo $projeto->proj_id ?>" type="radio" id="criterio1<?php echo $projeto->proj_id ?>" value="1"/>
                <label for="criterio1<?php echo $projeto->proj_id ?>"></label>
              </td>
              <td>
                <span>Coordenado pelo proponente e financiado por agência de fomento ou 
                  empresa e caracterizado na área de Desenvolvimento Tecnológico e Inovação</span>
              </td>
              <td>5</td>
            </tr>
            <tr>
              <td>
                <input class="criterio_projeto" name="criterio<?php echo $projeto->proj_id ?>" type="radio" id="criterio2<?php echo $projeto->proj_id ?>" value="2"/>
                <label for="criterio2<?php echo $projeto->proj_id ?>"></label>
              </td>
              <td>
                <span>Com participação do proponente como pesquisador/colaborador e financiado por 
                  agência de fomento ou empresa e caracterizado na área de Desenvolvimento 
                  Tecnológico e Inovação</span>
              </td>
              <td>4</td>
            </tr>
            <tr>
              <td>
                <input class="criterio_projeto" name="criterio<?php echo $projeto->proj_id ?>" type="radio" id="criterio3<?php echo $projeto->proj_id ?>" value="3"/>
                <label for="criterio3<?php echo $projeto->proj_id ?>"></label>
              </td>
              <td>
                <span>Coordenado pelo proponente e financiado por agência de fomento, caracterizado
                  como projeto de pesquisa básica que possua potencial para desenvolvimento de 
                  produtos ou processos inovadores</span>
              </td>
              <td>3</td>
            </tr>
            <tr>
              <td>
                <input class="criterio_projeto" name="criterio<?php echo $projeto->proj_id ?>" type="radio" id="criterio4<?php echo $projeto->proj_id ?>" value="4"/>
                <label for="criterio4<?php echo $projeto->proj_id ?>"></label>
              </td>
              <td>
                <span>Com participação do proponente como pesquisador/colaborador e financiado por 
                  agência de fomento, caracterizado como projeto de pesquisa básica que possua 
                  potencial para desenvolvimento de produtos ou processos inovadores</span>
              </td>
              <td>2</td>
            </tr>
            <tr>
              <td>
                <input class="criterio_projeto" name="criterio<?php echo $projeto->proj_id ?>" type="radio" id="criterio5<?php echo $projeto->proj_id ?>" value="5"/>
                <label for="criterio5<?php echo $projeto->proj_id ?>"></label>
              </td>
              <td>
                <span>Propostas sem comprovação de financiamento, mas com comprovação de 
                  infra-estrutura com capacidade instalada para execução do projeto</span>
              </td>
              <td>1</td>
            </tr>
          </tbody>
        </table>
        <table>
          <thead>
            <tr>
              <th>Escolha</th>
              <th>Critério do orientador</th>
              <th>Pontuação</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <input class="criterio_orientador" name="criterio_orientador<?php echo $projeto->proj_id ?>" type="radio" id="criterio_orientador_1<?php echo $projeto->proj_id ?>" value="1"/>
                <label for="criterio_orientador_1<?php echo $projeto->proj_id ?>"></label>
              </td>
              <td>
                <span>Com bolsa de produtividade em Desenvolvimento Tecnológico e Extensão Inovadora (DT) ou em Pesquisa (</span>
              </td>
              <td>5</td>
            </tr>
            <tr>
              <td>
                <input class="criterio_orientador" name="criterio_orientador<?php echo $projeto->proj_id ?>" type="radio" id="criterio_orientador_2<?php echo $projeto->proj_id ?>" value="2"/>
                <label for="criterio_orientador_2<?php echo $projeto->proj_id ?>"></label>
              </td>
              <td>
                <span>Produção média acima de 1 artigo científico/ano em Qualis A nos últimos 3 anos</span>
              </td>
              <td>4</td>
            </tr>
            <tr>
              <td>
                <input class="criterio_orientador" name="criterio_orientador<?php echo $projeto->proj_id ?>" type="radio" id="criterio_orientador_3<?php echo $projeto->proj_id ?>" value="3"/>
                <label for="criterio_orientador_3<?php echo $projeto->proj_id ?>"></label>
              </td>
              <td>
                <span>Produção média entre 1 e 0,6 artigo científicos/ano em Qualis A nos últimos 3 anos</span>
              </td>
              <td>3</td>
            </tr>
            <tr>
              <td>
                <input class="criterio_orientador" name="criterio_orientador<?php echo $projeto->proj_id ?>" type="radio" id="criterio_orientador_4<?php echo $projeto->proj_id ?>" value="4"/>
                <label for="criterio_orientador_4<?php echo $projeto->proj_id ?>"></label>
              </td>
              <td>
                <span>Produção média acima de e 1,0 artigo científico/ano em Qualis A ou B nos últimos 3 anos </span>
              </td>
              <td>2</td>
            </tr>
            <tr>
              <td>
                <input class="criterio_orientador" name="criterio_orientador<?php echo $projeto->proj_id ?>" type="radio" id="criterio_orientador_5<?php echo $projeto->proj_id ?>" value="5"/>
                <label for="criterio_orientador_5<?php echo $projeto->proj_id ?>"></label>
              </td>
              <td>
                <span>Produção média acima de 0,5 artigo científico/ano em Qualis A ou B, ou livro/capítulo de livro nos ú</span>
              </td>
              <td>1</td>
            </tr>
          </tbody>
        </table>
      </form>

    </div>

  </li>
</ul>
