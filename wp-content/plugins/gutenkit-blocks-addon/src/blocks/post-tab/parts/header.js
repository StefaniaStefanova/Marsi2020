import handleActiveClass from "../Event";

const Header = ({ category, index, eventType }) => {
    const active = index === 0 ? 'active' : '';

    const mountEventProp = {};
    eventType === 'mouseenter' ? (mountEventProp.onMouseEnter = handleActiveClass) : (mountEventProp.onClick = handleActiveClass);
    
    return (
        <span className={`tab__list__item ${active}`} data-category-id={category.value} {...mountEventProp}>
            {category.label}
        </span>
    )
}

export default Header