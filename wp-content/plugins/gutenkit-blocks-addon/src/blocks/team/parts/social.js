const Social = ({ items, isEdit }) => {
    const clickProps = {};
    isEdit ? clickProps.onClick = e => e.preventDefault() : null; 

    const { linkGenerator } = window.gutenkit.helpers;
    const { GkitIcon } = window.gutenkit.components;

    const listItems = items.map((item, index) => {
        let linkAttributes = {
            ...linkGenerator(item['link']),
            title: item.label,
            ...clickProps
        } 
        
        return (
            <li key={index} className={`gkit-team-social-list-item-${index}`}>
                <a {...linkAttributes}>
                    <GkitIcon icon={item.icon} />
                </a>
            </li>
        )
    });

    return (
        <ul className="gkit-team-social-list">{listItems}</ul>
    )
}

export default Social