 GrapesJS Editor Bundle
==============================
A demo implementation of the [GrapesJS Page Builder](https://grapesjs.com) for the Oro platform.

**~~NOTE: This demonstration Bundle is unsupported and is currently unsuitable for Production use~~**

**NOTE: Development of the GrapesJS Page Builder has been migrated to Oro Core as of 4.1**

Refer to: https://oroinc.com/b2b-ecommerce/blog/updates-to-orocommerce-4-1-rc

Video demonstration:

[![GrapesJS Demo](http://i3.ytimg.com/vi/-y6LjIl4RWc/hqdefault.jpg)](https://www.youtube.com/watch?v=-y6LjIl4RWc)

* Many of the demo Components do not yet work correctly (eg Form elements, Countdown timer)
* The image/media uploader is not yet implemented, URL's can be pasted into the form as a workaround
* There is a slight mismatch between Editor and Frontend styling due to possible CSS conflicts

Background
-------------------
During the [2019 Oro Hackathon](http://hackoro.com) one of the teams collaborated 
on a proof-of-concept Page Builder for Oro, to replace the existing WYSIWYG editor.

This demonstration Bundle is an expansion of this proof-of-concept.

Installation and Usage
-------------------
**NOTE: Adjust instructions as needed for your local environment**

1. Download and Install Bundle into `src/HackOro/GrapesJSBundle/` directory
1. Clear Oro Cache:
    ```bash
    php bin/console cache:clear --env=prod
    # (Or --env=dev)
    ```
1. Run schema migrations:
    ```bash
    php bin/console oro:migration:load --force --env=prod                               
    # (Or --env=dev)
    ```
1. Rebuild assets:
    ```bash
    php bin/console assets:install --env=prod --symlink
    php bin/console oro:assets:build --env=prod
    php bin/console oro:requirejs:build --env=prod
    ```
1. Login to Oro admin
1. Navigate to **Marketing => GrapesJS Content Pages**
1. Click "Add New"
1. Create content as needed
1. Click "Save and Close"
1. Navigate to **Marketing => Web Catalogs**
1. "Edit Content Tree" for a Web Catalog
1. "Create Content Node" (or edit existing)
1. Under "Content Variants", select "Add GrapesJS Content Page" from the dropdown button
1. Configure as needed (select GrapesJS Content Page created previously)
1. "Save"
1. Navigate to page on frontend and preview

Roadmap / Remaining Tasks
-------------------

- [ ] Cleanup `grapesjs-editor-component.js` (remove hard-coded settings with configurable options)
- [ ] Cleanup injection of JS/CSS assets (remove `script` and `style` tags from Twig templates)
- [ ] Improve embedded editor in admin page to reduce the amount vertical scrolling needed during editing
- [ ] Move Components/Properties panel from right to left side of editor
- [ ] Prevent side panel from changing to Properties mode whenever a new Component is added
- [ ] Replace hard-coded canvas style with current theme CSS:
    ```js
    # public/js/app/components/grapesjs-editor-component.js:34
    canvas: {
        styles: [
            // TODO: This should be dynamic
            "/css/layout/basetheme/styles.css"
        ]
    }
    ```
- [ ] Remove `grapesjs-preset-webpage.min.js` borrowed from the [GrapesJS Demo](https://grapesjs.com/demo.html), it contains unnecessary components
- [ ] Add "theme switcher" to preview content using different themes
- [ ] Add ability to swap out TinyMCE with GrapesJS (ie for editing Landing Pages and Content Blocks) 
- [ ] Add Composer support
- [ ] Create "Product" Component (select and embed single Product in Content page as add-to-cart form)
- [ ] Create "Product Segment" Component (select and embed Product Segment in Content page as dynamic carousel)
- [ ] Create "Contact Us Form" Component (select and embed Contact Form in Content page)
- [ ] Create "Banner/Slider" Component (customize transitions and text overlays)
- [ ] Improve Responsive Preview functionality
- [ ] Implement Image Uploader (with support for S3/GCS storage backends)
- [ ] Rename "GrapesJS" in bundle, content variant, DB schema, and all other references to new generic name
- [ ] Implement autosave/draft/versioning support
- [ ] Add ability to disable site header/footer to create cleaner Landing Pages (Possibly out of scope)

Licence
-------------------
[MIT - MIT License](./LICENSE)
