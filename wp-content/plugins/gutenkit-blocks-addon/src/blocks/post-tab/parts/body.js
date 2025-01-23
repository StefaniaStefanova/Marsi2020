import { useEffect, useState } from '@wordpress/element';
import apiFetch from '@wordpress/api-fetch';
import { __ } from '@wordpress/i18n';
import Post from './post';

const Body = ({ category, attributes, index }) => {
    const active = index === 0 ? 'active' : '';
    const [posts, setPosts] = useState([]);

    useEffect(() => {
        apiFetch({ path: `/wp/v2/posts?categories=${category.value}&per_page=${attributes.postCount}` })
            .then((response) => {
                setPosts(response)
            })
            .catch((error) => {
                console.error(error)
            })
    }, [attributes.postCount])

    return (
        <div className={`tab-item ${active}`} data-category-id={category.value}>
            {posts.map((post, index) => 
                <Post key={index} post={post} attributes={attributes} />
            )}

            <div className="clearfix"></div>
        </div>
    )
}

export default Body