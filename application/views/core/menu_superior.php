<nav id="menu_superior" class="uk-navbar uk-navbar-container uk-margin" uk-navbar>
    <!-- Ícono que activa el menú lateral -->
    <a class="uk-navbar-toggle" href="#" uk-toggle="target: #offcanvas-nav" title="Visualice el menú principal" uk-tooltip="pos: right">
        <span uk-navbar-toggle-icon></span>
    </a>
    
    <!-- Menú derecho -->
    <div class="uk-navbar-right uk-hidden">
        <ul class="uk-iconnav">
            <li id="icono_crear"><a uk-icon="icon: plus" title="Crear" uk-tooltip="pos: bottom-left" onClick="javascript:crear()"></a></li>
            <li id="icono_editar"><a uk-icon="icon: file-edit" title="Editar" uk-tooltip="pos: bottom-center" onClick="javascript:editar()"></a></li>
            <li id="icono_eliminar"><a uk-icon="icon: trash" title="Eliminar" uk-tooltip="pos: bottom-left" onClick="javascript:eliminar()"></a></li>
            <li id="icono_iniciar"><a uk-icon="icon: play" title="Iniciar medición" uk-tooltip="pos: bottom-left" onClick="javascript:iniciar_medicion()"></a></li>
            <li id="icono_anterior"><a uk-icon="icon: chevron-left" title="Anterior" uk-tooltip="pos: bottom-left" onClick="javascript:anterior()"></a></li>
            <li id="icono_terminar"><a uk-icon="icon: close" title="Terminar" uk-tooltip="pos: bottom-left" onClick="javascript:terminar()"></a></li>
            <li id="icono_siguiente"><a uk-icon="icon: chevron-right" title="Siguiente" uk-tooltip="pos: bottom-left" onClick="javascript:siguiente()"></a></li>
        </ul>
    </div>
</nav>