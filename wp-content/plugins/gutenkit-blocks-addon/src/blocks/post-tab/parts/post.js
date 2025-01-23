
import { useEffect, useState } from '@wordpress/element';
import apiFetch from '@wordpress/api-fetch';

function Post({ post, attributes }) {
    const thumnailId = post.featured_media;
    const [thumbnailUrl, setThumbnailUrl] = useState('');
	const { truncateWords, placeholderImage } = window.gutenkit.helpers;

    useEffect(() => {
        if (thumnailId) {
            apiFetch({ path: `/wp/v2/media/${thumnailId}` })
                .then((media) => {
                    setThumbnailUrl(media?.source_url);
                })
                .catch((error) => {
                    console.error(error);
                });
        } else {
            setThumbnailUrl(placeholderImage);
        }
    }, [thumnailId]);

    return (
        <div className="tab__post__single--item">
            <div className="tab__post__single--inner">
                <a href='#' className="tab__post--header" aria-label="url">
                    <img src={thumbnailUrl} alt={post.title.rendered} className='gutenkit-post-tab-thumbnail-image' />
                </a>
                <h3 className="tab__post--title"><a href='#'>{attributes?.enableCropTitle ? truncateWords(post.title.rendered, attributes?.numberOfWordsTitle) : post.title.rendered}</a></h3>
            </div>
        </div>
    )
}

export default Post