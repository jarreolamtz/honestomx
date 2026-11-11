# Honesto

Sitio de [honestocreative.com](https://honestocreative.com), hecho en WordPress con un tema propio: **`honesto2026`**.

Esta guía explica cómo trabajar en el proyecto y, sobre todo, **cómo publicar cambios en el sitio real** sin riesgos.

---

## En resumen

1. Haces tus cambios en el tema y los pruebas en tu computadora.
2. Haces commit y push a `main`.
3. GitHub hace automáticamente una **simulación**: te dice qué archivos subiría y cuáles borraría, **sin tocar el sitio**.
4. Si la simulación se ve bien, publicas con un clic desde GitHub.

Nadie sube archivos a mano por FTP. Todo pasa por GitHub, así siempre sabemos qué se publicó y cuándo.

---

## Qué se publica (y qué no)

| Se publica desde este repo | **No** se publica desde aquí |
|---|---|
| El tema: `app/public/wp-content/themes/honesto2026/` | WordPress, plugins, imágenes subidas (`uploads`), base de datos, `wp-config.php` |

Lo que no está en la columna izquierda se administra directo en el admin de WordPress del sitio real (contenido de páginas, proyectos, menús, plugins, etc.).

---

## Trabajar en tu computadora

El proyecto usa [Local](https://localwp.com) para correr WordPress en tu computadora.

1. Clona el repo.
2. Pide al responsable del proyecto un respaldo del sitio para importarlo en Local (la base de datos y las imágenes no están en git).
3. En Local, el sitio se llama `honesto.local`.
4. Todo el código del tema está en `app/public/wp-content/themes/honesto2026/`.

### Cómo escribir los commits

En español de México, con un título claro y una explicación sencilla de **qué cambia y por qué**, pensando en que lo lea alguien que no estuvo en la conversación. Por ejemplo:

```
Muestra el editor de texto en las páginas que sí lo usan

El tema ocultaba el editor en todas las páginas del admin, así que no
había forma de editar Aviso de privacidad ni Términos y condiciones.
Ahora solo se oculta en las páginas que tienen su propia plantilla.
```

---

## Cómo publicar cambios en el sitio real

### 1. Haz push a `main`

En cuanto subes cambios del tema a `main`, GitHub corre el proceso **"Deploy tema a IONOS"** en modo simulación. Lo ves en la pestaña **Actions** del repo.

### 2. Revisa la simulación

Abre la corrida en **Actions → Deploy tema a IONOS** y entra al paso **"Sincronizar tema por SFTP"**. Vas a ver líneas como estas:

| Línea en el log | Qué significa |
|---|---|
| `Transferring file 'css/global.css'` | Ese archivo se subiría (o se reemplazaría) |
| `Removing old file 'img/viejo.svg'` | Ese archivo se **borraría** del servidor porque ya no está en el repo |
| `Making directory 'css'` | Se crearía esa carpeta en el servidor |

**Lo normal:** se suben todos los archivos del tema (unos 75) y solo se borran los que tú quitaste a propósito.

**Señal de alerta:** si aparecen `Making directory` para carpetas que ya existen (`css`, `img`, `js`…) o se borran archivos que no quitaste, **no publiques** y avisa al responsable del proyecto.

> Al principio de la corrida, el aviso **`Modo SIMULACIÓN`** o **`Modo DEPLOY REAL`** te dice cuál fue. Fíjate en ese aviso, no en el código del script que aparece arriba de él.

### 3. Publica

1. Ve a **Actions → Deploy tema a IONOS → Run workflow** (botón a la derecha).
2. **Quita la palomita** de *"Simulación: solo listar cambios, sin subir nada"*.
3. Da clic en **Run workflow**.
4. Abre la corrida y confirma que diga **`Modo DEPLOY REAL`** y que termine en verde.

### 4. Revisa el sitio

Abre [honestocreative.com](https://honestocreative.com) y revisa las páginas que cambiaste. No hace falta borrar caché: cada archivo CSS y JS lleva su propia versión, así que los navegadores descargan la nueva automáticamente.

### Si algo salió mal

Todo el tema está en git. Para regresar a como estaba:

1. Revierte el commit que causó el problema (`git revert <commit>`) y haz push.
2. Publica de nuevo (paso 3).

---

## Medidas de seguridad

El proceso está pensado para que sea difícil romper algo por accidente:

- **Siempre empieza en simulación.** Los push nunca publican solos; alguien tiene que dar clic en *Run workflow* y quitar la palomita.
- **Solo toca la carpeta del tema.** El usuario de SFTP que usa GitHub solo tiene acceso a la carpeta de temas, no al resto del sitio ni a `wp-config.php`.
- **Revisa la ruta antes de conectarse.** Si la ruta configurada no termina en `/honesto2026`, el proceso se detiene sin subir ni borrar nada.
- **Verifica que el servidor sea el real.** Si el servidor no presenta la huella digital guardada, no se conecta ni envía la contraseña.
- **Nunca hay dos publicaciones al mismo tiempo.** Si alguien publica mientras otra corre, espera su turno.
- **Las contraseñas no están en el código.** Se guardan cifradas en GitHub y aparecen como `***` en los logs.

---

## Configuración (solo para quien administra el repo)

Está en **Settings → Secrets and variables → Actions**. Los valores los tiene el responsable del proyecto; no se comparten por chat ni se escriben en el repo, porque es público.

**Secrets:**

| Nombre | Qué es |
|---|---|
| `SFTP_HOST` | Servidor SFTP de IONOS |
| `SFTP_USER` | Usuario SFTP exclusivo para publicar (limitado a la carpeta de temas) |
| `SFTP_PASSWORD` | Contraseña de ese usuario |
| `SFTP_THEME_PATH` | Ruta del tema vista desde ese usuario: `/honesto2026` |
| `SFTP_KNOWN_HOST` | Huella digital del servidor. Se obtiene con `ssh-keyscan -t ed25519,ecdsa,rsa <servidor>` |
| `SFTP_PORT` | Opcional. Puerto SFTP; si no existe se usa el 22 |

**Variable (opcional):**

| Nombre | Qué hace |
|---|---|
| `DEPLOY_ENABLED` | Si vale `true`, cada push a `main` que toque el tema **se publica solo**, sin simulación. Hoy no está activada a propósito. |

### Problemas comunes

| Error en la corrida | Causa probable |
|---|---|
| `Faltan secrets: ...` | Falta crear alguno de los secrets de arriba |
| `SFTP_THEME_PATH debe terminar en /honesto2026` | La ruta está mal escrita |
| `Host key verification failed` | Cambió el servidor o su huella; hay que actualizar `SFTP_KNOWN_HOST` |
| `Login failed` / `Permission denied` | Usuario o contraseña incorrectos |
| La simulación crea todas las carpetas (`Making directory 'css'`, `'img'`…) | La ruta apunta a un lugar donde no está el tema |

El proceso está definido en [`.github/workflows/deploy-theme.yml`](.github/workflows/deploy-theme.yml).
