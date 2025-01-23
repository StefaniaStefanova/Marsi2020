import { createBlock } from '@wordpress/blocks';
const transforms = {
    from: [
        {
            type: 'block',
            isMultiBlock: true,
            blocks: ['*'],
            __experimentalConvert(blocks) {
                const conatinerInnerBlocks = blocks.map((block) => {
                    return createBlock(
                        block.name,
                        block.attributes,
                        block.innerBlocks
                    );
                });

                return createBlock(
                    'gutenkit/container',
                    {
                        variationSeleted: true,
                        columnsWidth: 100
                    },
                    conatinerInnerBlocks
                );
            },
        },
    ],
    to: [
        {
            type: 'block',
            blocks: ['*'],
            transform: (attributes, innerBlocks) => innerBlocks,
        },
    ],
};


export default transforms;