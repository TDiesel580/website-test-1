#!/usr/bin/env python3

def hex_to_rgb(hex_color):
    hex_color = hex_color.lstrip("#")
    return tuple(
        int(hex_color[i:i + 2], 16) / 255
        for i in (0, 2, 4)
    )


def linearize(channel):
    if channel <= 0.04045:
        return channel / 12.92
    return ((channel + 0.055) / 1.055) ** 2.4


def luminance(hex_color):
    r, g, b = hex_to_rgb(hex_color)
    r = linearize(r)
    g = linearize(g)
    b = linearize(b)
    return 0.2126 * r + 0.7152 * g + 0.0722 * b


def contrast_ratio(color_a, color_b):
    l1 = luminance(color_a)
    l2 = luminance(color_b)
    lighter = max(l1, l2)
    darker = min(l1, l2)
    return (lighter + 0.05) / (darker + 0.05)


tests = [
    ("Body text on white", "#20262c", "#ffffff", 4.5),
    ("Muted text on white", "#4b5560", "#ffffff", 4.5),
    ("Blue link on white", "#0066b3", "#ffffff", 4.5),
    ("Blue focus on white", "#0066b3", "#ffffff", 3.0),
    ("Orange CTA + dark text", "#11161b", "#eb7b2e", 4.5),
    ("White on dark footer", "#ffffff", "#11161b", 4.5),
]

failed = False

for name, foreground, background, minimum in tests:
    ratio = contrast_ratio(foreground, background)
    passed = ratio >= minimum

    print(
        f"{'PASS' if passed else 'FAIL'} "
        f"{name}: {ratio:.2f}:1 "
        f"(required {minimum:.1f}:1)"
    )

    if not passed:
        failed = True

raise SystemExit(1 if failed else 0)
