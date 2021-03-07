const { registerBlockType } = wp.blocks;
const { 
    InspectorControls,
    MediaUpload
} = wp.editor;
const { RichText} = wp.blockEditor;

const { PanelBody, IconButton} = wp.components;

registerBlockType('gnarlyknots/custom-testimonial', {
    // built-in attributes
    title: 'Testimonial',
    description: 'Block to generate a custom Testimonial',
    icon: 'format-image',
    category: 'layout',

    // custom attributes
    attributes: {
        title: {
            type: 'string'
        },
        body: {
            type: 'string'
        },
        image: {
            type: 'string',
            default: null
        }
    },

    // custom functions

    // built-in functions
    edit({ attributes, setAttributes }) {
        const {
            title,
            body,
            image
        } = attributes;

        //custom functions
        function onChangeTitle(newTitle){
            setAttributes ( { title: newTitle } )
        }
        
        function onChangeBody(newBody){
            setAttributes( { body: newBody } );
        }

        function onSelectImage(newImage) {
            setAttributes( { image: newImage.sizes.full.url } );
        }

        return ([
            <InspectorControls style={ { marginBottom: '40px' } }>
                <PanelBody title={ 'Background Image Settings' }>
                    <p><strong>Select an Image:</strong></p>
                    <MediaUpload
                        onSelect={ onSelectImage }
                        type="image"
                        value={ image }
                        render={ ( { open } ) => (
							<IconButton
								className="editor-media-placeholder__button is-button is-default is-large"
								icon="upload"
								onClick={ open }>
								Background Image
							</IconButton>
						)}/>
                </PanelBody>
            </InspectorControls>,
            <>
                <RichText key="editable"
                          tagName="h2"
                          placeholder="Your Testimonial Title"
                          value={ title }
                          onChange={ onChangeTitle }/>
                <RichText key="editable"
                          tagName="p"
                          placeholder="Your Testimonial description"
                          value={ body }
                          onChange={ onChangeBody }/>
            </>
        ]);
    },
    save({ attributes }) {
        const {
            title,
            body
        } = attributes
        return ([
            <p>"hello"</p>
         ])
    }
});