const FilterByComp = (props) => {

    return (
        <div
            className={'capitalize border-style-default radius-m pt-s pb-s font-size-s text-link box-border grid-start w-max-content'}>
            <p className={'font-light text-center radius-s border-style-default w-max-content ps-center pr-s pl-s'}>{props.name}</p>
            <div className={'table-box pr-s pl-s'}>
                <div className={'flex-aic-jce gap-m w-full'}>
                    {props.filters.map((value, index) => (
                        <div key={index}
                             className={`cursor-pointer font-medium radius-s text-hover-underline ${props.defaultValue === value ? 'badge badge-small bg-primary' : ''}`}
                             onClick={() => props.handleOnChange(value)}>
                            {value}
                        </div>
                    ))}
                </div>
            </div>
        </div>
    )
}

export default FilterByComp;