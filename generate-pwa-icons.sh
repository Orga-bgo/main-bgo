#!/bin/bash

# PWA Icon Generator für babixGO
# Generiert alle benötigten Icon-Größen aus dem 512x512 Master-Icon

set -e

SOURCE_ICON="/home/user/main-bgo/shared/assets/img/pwa/icon-512x512.png"
OUTPUT_DIR="/home/user/main-bgo/shared/assets/img/pwa"
FAVICON_DIR="/home/user/main-bgo/shared/assets/public"

# Farben für Output
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

echo "================================================"
echo "  babixGO PWA Icon Generator"
echo "================================================"
echo ""

# Check if ImageMagick is installed
if ! command -v convert &> /dev/null; then
    echo -e "${YELLOW}ERROR: ImageMagick is not installed.${NC}"
    echo ""
    echo "Please install ImageMagick first:"
    echo "  - Ubuntu/Debian: sudo apt-get install imagemagick"
    echo "  - macOS: brew install imagemagick"
    echo "  - CentOS/RHEL: sudo yum install ImageMagick"
    echo ""
    exit 1
fi

# Check if source icon exists
if [ ! -f "$SOURCE_ICON" ]; then
    echo -e "${YELLOW}ERROR: Source icon not found at $SOURCE_ICON${NC}"
    exit 1
fi

echo "Source icon: $SOURCE_ICON"
echo "Output directory: $OUTPUT_DIR"
echo ""

# Array of sizes to generate (PWA icons)
PWA_SIZES=(16 32 72 96 128 144 152 192 384 512)

echo "Generating PWA icons..."
for size in "${PWA_SIZES[@]}"; do
    output_file="$OUTPUT_DIR/icon-${size}x${size}.png"

    # Skip if already exists (except 192 and 512 which we already have)
    if [ -f "$output_file" ] && [ "$size" != "192" ] && [ "$size" != "512" ]; then
        echo "  ✓ icon-${size}x${size}.png already exists, skipping..."
        continue
    fi

    # Generate icon
    if [ "$size" == "192" ] || [ "$size" == "512" ]; then
        echo "  ✓ icon-${size}x${size}.png already exists"
    else
        convert "$SOURCE_ICON" -resize ${size}x${size} "$output_file"
        echo -e "  ${GREEN}✓${NC} Generated icon-${size}x${size}.png"
    fi
done

echo ""
echo "Generating favicons..."

# Generate favicons for different browsers
convert "$SOURCE_ICON" -resize 16x16 "$FAVICON_DIR/favicon-16x16.png"
echo -e "  ${GREEN}✓${NC} Generated favicon-16x16.png"

convert "$SOURCE_ICON" -resize 32x32 "$FAVICON_DIR/favicon-32x32.png"
echo -e "  ${GREEN}✓${NC} Generated favicon-32x32.png"

# Generate multi-resolution favicon.ico
convert "$SOURCE_ICON" -resize 16x16 \
        "$SOURCE_ICON" -resize 32x32 \
        "$SOURCE_ICON" -resize 48x48 \
        "$FAVICON_DIR/favicon.ico"
echo -e "  ${GREEN}✓${NC} Generated favicon.ico (multi-resolution)"

# Generate Apple Touch Icon (180x180 is the standard)
convert "$SOURCE_ICON" -resize 180x180 "$OUTPUT_DIR/apple-touch-icon.png"
echo -e "  ${GREEN}✓${NC} Generated apple-touch-icon.png (180x180)"

echo ""
echo "================================================"
echo -e "  ${GREEN}✓ All icons generated successfully!${NC}"
echo "================================================"
echo ""
echo "Generated icons:"
echo "  - PWA icons: 16x16 to 512x512"
echo "  - Favicons: 16x16, 32x32, favicon.ico"
echo "  - Apple Touch Icon: 180x180"
echo ""
echo "Next steps:"
echo "  1. Verify icons in $OUTPUT_DIR"
echo "  2. Update manifest.json (already done)"
echo "  3. Update head-links.php (already done)"
echo "  4. Test PWA installation on mobile devices"
echo ""
