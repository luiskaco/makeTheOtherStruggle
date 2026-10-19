Add-Type -AssemblyName System.Drawing

$width = 1200
$height = 900
$bmp = New-Object System.Drawing.Bitmap($width, $height)
$g = [System.Drawing.Graphics]::FromImage($bmp)
$g.SmoothingMode = [System.Drawing.Drawing2D.SmoothingMode]::AntiAlias
$g.TextRenderingHint = [System.Drawing.Text.TextRenderingHint]::AntiAliasGridFit
$g.InterpolationMode = [System.Drawing.Drawing2D.InterpolationMode]::HighQualityBicubic

# 1. Fondo crema calido (#fdf8f3)
$bgBrush = New-Object System.Drawing.SolidBrush([System.Drawing.ColorTranslator]::FromHtml('#fdf8f3'))
$g.FillRectangle($bgBrush, 0, 0, $width, $height)
$bgBrush.Dispose()

# 2. Si existe fondo-ribbons, dibujarlo sutilmente
$ribbonsPath = "wp-content/themes/la-otra-lucha/assets/img/fondo-ribbons.png"
if (Test-Path $ribbonsPath) {
    $ribbonsImg = [System.Drawing.Image]::FromFile((Resolve-Path $ribbonsPath))
    $g.DrawImage($ribbonsImg, 0, 0, $width, $height)
    $ribbonsImg.Dispose()
}

# 3. Franja superior del Header (rosa oficial #e46f94)
$headerBrush = New-Object System.Drawing.SolidBrush([System.Drawing.ColorTranslator]::FromHtml('#e46f94'))
$g.FillRectangle($headerBrush, 0, 0, $width, 80)
$headerBrush.Dispose()

# Texto del Header
$fontHeader = New-Object System.Drawing.Font('Arial', 16, [System.Drawing.FontStyle]::Bold)
$fontWhiteBrush = New-Object System.Drawing.SolidBrush([System.Drawing.Color]::White)
$g.DrawString('POR UN PERU SIN CANCER', $fontHeader, $fontWhiteBrush, 60, 26)

$fontPill = New-Object System.Drawing.Font('Arial', 13, [System.Drawing.FontStyle]::Bold)
$purpleBrush = New-Object System.Drawing.SolidBrush([System.Drawing.ColorTranslator]::FromHtml('#73589f'))
$g.FillRectangle($purpleBrush, 960, 18, 180, 44)
$g.DrawString('LA OTRA LUCHA', $fontPill, $fontWhiteBrush, 985, 30)

# 4. Imagen hero a la derecha
$heroPath = "wp-content/themes/la-otra-lucha/assets/img/hero-calado.png"
if (Test-Path $heroPath) {
    $heroImg = [System.Drawing.Image]::FromFile((Resolve-Path $heroPath))
    $destX = 520
    $destY = 110
    $destW = 680
    $destH = 680
    $g.DrawImage($heroImg, $destX, $destY, $destW, $destH)
    $heroImg.Dispose()
}

# 5. Textos del Hero a la izquierda
$darkBrush = New-Object System.Drawing.SolidBrush([System.Drawing.ColorTranslator]::FromHtml('#2c2727'))
$pinkBrush = New-Object System.Drawing.SolidBrush([System.Drawing.ColorTranslator]::FromHtml('#e46f94'))

$fontTitle1 = New-Object System.Drawing.Font('Arial Black', 34, [System.Drawing.FontStyle]::Bold)
$fontTitle2 = New-Object System.Drawing.Font('Arial', 20, [System.Drawing.FontStyle]::Bold)
$fontScript = New-Object System.Drawing.Font('Georgia', 48, [System.Drawing.FontStyle]::Italic)
$fontSub = New-Object System.Drawing.Font('Arial', 14, [System.Drawing.FontStyle]::Regular)

$g.DrawString('EL CANCER YA ES UNA', $fontTitle1, $darkBrush, 60, 160)
$g.DrawString('LUCHA.', $fontTitle1, $pinkBrush, 60, 220)

$g.DrawString('ACCEDER A UNA ATENCION OPORTUNA ES', $fontTitle2, $darkBrush, 60, 310)
$g.DrawString('la otra lucha', $fontScript, $pinkBrush, 60, 355)

# Barra decorativa
$strokePen = New-Object System.Drawing.Pen([System.Drawing.ColorTranslator]::FromHtml('#73589f'), 6)
$g.DrawLine($strokePen, 65, 435, 380, 435)
$strokePen.Dispose()

# Subtitulo explicativo
$line1 = 'Theme oficial de la campana nacional para visibilizar las barreras'
$line2 = 'en la ruta de atencion del cancer de mama en el Peru.'
$line3 = ''
$line4 = '  * One-Page responsivo y accesible (HTML5 semantico)'
$line5 = '  * Provision automatica de pagina de inicio al activar'
$line6 = '  * Soporte de ACF Pro con fallback dinamico integrado'
$line7 = '  * Arquitectura modular con template-parts en PHP'

$fullSub = "$line1`n$line2`n$line3`n$line4`n$line5`n$line6`n$line7"
$g.DrawString($fullSub, $fontSub, $darkBrush, 60, 465)

# Botones
$g.FillRectangle($pinkBrush, 60, 680, 200, 50)
$btnFont = New-Object System.Drawing.Font('Arial', 12, [System.Drawing.FontStyle]::Bold)
$g.DrawString('VER CAMPANA', $btnFont, $fontWhiteBrush, 90, 695)

$g.FillRectangle($purpleBrush, 280, 680, 220, 50)
$g.DrawString('CONOCE DERECHOS', $btnFont, $fontWhiteBrush, 300, 695)

# 6. Franja inferior institucional (#73589f)
$g.FillRectangle($purpleBrush, 0, 810, $width, 90)
$footerFont = New-Object System.Drawing.Font('Arial', 13, [System.Drawing.FontStyle]::Bold)
$footerText = 'CADA ETAPA IMPORTA   -   CADA ETAPA DEMORA   -   CADA BARRERA DEBE VISIBILIZARSE'
$g.DrawString($footerText, $footerFont, $fontWhiteBrush, 220, 845)

# Guardar screenshot.png
$outputPath = 'wp-content/themes/la-otra-lucha/screenshot.png'
$bmp.Save($outputPath, [System.Drawing.Imaging.ImageFormat]::Png)

$g.Dispose()
$bmp.Dispose()

Write-Host "Screenshot generado exitosamente en $outputPath"
