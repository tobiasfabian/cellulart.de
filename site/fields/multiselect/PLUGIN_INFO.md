The Multiselect field plugin introduces a select field type for the panel that allows you to choose multiple entries.

# Installation & Update
Copy the files to `site/fields/multiselect/`.


# Usage

Use it in your blueprint:

```
bestband:
  label: Best Band Ever
  type: multiselect
  required: true
  options:
    1d : 1Direction
    bb: BBoys
    aq: Aqua
    vb: Vengaboys
    fr: Freiheit
    o3: OH!O
    mi: Miley
    bi: Bieber
    u2: U2
```

Result: 

![multiselect](https://cloud.githubusercontent.com/assets/3788865/7901802/8761ab8c-079b-11e5-98f2-a59f8a1d2e1c.gif)

It can also be used with the usual field options (pages etc.) of the checkboxes field.
