<header>

	<div class='titulo_pagina' id='titulo_pagina'>
		<h1 id='titulo_pagina_h1' class='titulo_pagina_h1'>
			<?php

				if (isset($titulo_pagina_h1)) {
					echo $titulo_pagina_h1;
				}else{
					echo "Sin titulo asignado";
				}
			?>
		</h1>
	</div>
	<div class='navigation' id='navigation'>		
		<ul>
			<li>pag1 </li>
			<li>pag2 </li>
			<li>pag3 </li>
		</ul>	
	</div>
</header>