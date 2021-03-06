wp.blocks.registerBlockType( 'my-custom-cutenberg-blocks/myfirstblock', {
    title: 'My First Block',
    icon: 'welcome-add-page',
    category: 'common',
    attributes: {
        content: {
            type: 'array',
            source: 'children',
            selector: 'p',
        }
    },

    edit: function( props ) {
        return wp.element.createElement( wp.blocks.RichText, {
            tagName: 'p',
            className: props.className,
            value: props.attributes.content,
            onChange: function( newContent ) {
                props.setAttribute( { content: newContent } );
            }
        });
    },

    save: function( props ) {
        return wp.element.createElement( 'p', {
            className: props.className
        }, props.attributes.content );
    }
});