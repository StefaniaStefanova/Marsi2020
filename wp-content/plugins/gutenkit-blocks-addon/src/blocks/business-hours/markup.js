const Markup = ({ attributes }) => {
    return (
        <div className="gkit-business-hours">
            {
                attributes?.gkitBusinessOpendayList.length && attributes?.gkitBusinessOpendayList.map((item, index) => {
                    if (item?.gkitBusinessDay || item?.gkitBusinessTime) {
                        return (
                            <div className={`gkit-single-day gkit-single-day-item-${Number(index)} ${item?.gkitHighlightThisDay ? 'gkit-highlight-this-day' : ''}`} key={index}>
                                {
                                    item?.gkitBusinessDay && (
                                        <span className="gkit-business-day">{item?.gkitBusinessDay}</span>
                                    )
                                }
                                {
                                    item?.gkitBusinessTime && (
                                        <span className="gkit-business-time">{item?.gkitBusinessTime}</span>
                                    )
                                }
                            </div>
                        )
                    }
                })
            }
        </div>
    )
}

export default Markup