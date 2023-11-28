"use strict";
var preventDefaultFunction = (event) => {
	event.preventDefault();
	event.stopPropagation();
};
const toggleFeedFilterActive = (event) => {
	preventDefaultFunction(event);
	const target = event.currentTarget || event.target;
	const filterContainer = target.closest(".filterContainer");
	const filters = filterContainer.getElementsByClassName("filters")[0];
	const filterButton = filterContainer.getElementsByClassName("filterButton")[0];
	filterButton.classList.toggle("active");
	filters.classList.toggle("active");
};
const toggleFeedSortActive = (event) => {
	preventDefaultFunction(event);
	const target = event.currentTarget || event.target;
	const filterContainer = target.closest(".filterContainer");
	const sortContainer = filterContainer.getElementsByClassName("sortContainer")[0];
	const sortButton = filterContainer.getElementsByClassName("sortButton")[0];
	sortButton.classList.toggle("active");
	sortContainer.classList.toggle("active");
};
const toggleFeedFilterDropdownActive = (event) => {
	preventDefaultFunction(event);
	const target = event.currentTarget || event.target;
	const filter = target.closest(".filter");
	const filterDropdown = filter.getElementsByClassName("filterDropdown")[0];
	filter.classList.toggle("active");
	filterDropdown.classList.toggle("active");
};
const handleFeedLoadMore = (event) => {
	preventDefaultFunction(event);
	const target = event.currentTarget || event.target;
	const feedParent = document.getElementById("productResultsFeed");
	const feed = target.closest(".feed");
	const inner = feed.getElementsByClassName("inner")[0];
	const defaultFeedCount = parseInt(feedParent.dataset.defaultfeedcount) || 0;
	inner.style.maxHeight = `${inner.offsetHeight}px`;
	updateFeedActiveItems(defaultFeedCount);
	inner.style.maxHeight = "";
	updateFeedLoadMore();
};
const getQueryParameterValue = (url, key) => {
	const urlObject = new URL(url);
	const searchParams = urlObject.searchParams;
	if (searchParams.has(key)) {
		const value = searchParams.get(key);
		if (value) {
			return decodeURIComponent(value);
		}
	}
	return null;
};
const getQueryParamKeys = () => {
	//@ts-ignore
	const currentURL = new URL(window.location);
	const searchParams = currentURL.searchParams;
	const keys = [];
	for (const key of searchParams.keys()) {
		keys.push(key);
	}
	return keys;
};
const handleFiltersOnLoad = () => {
	const queryParamKeys = getQueryParamKeys();
	const feedParent = document.getElementById("productResultsFeed");
	const filters = feedParent.getElementsByClassName("filter");
	const queryFilters = [];
	const activeFilters = JSON.parse(feedParent.dataset.activefilters) || [];
	for (const key of queryParamKeys) {
		const value = getQueryParameterValue(window.location.href, key);
		if (value) {
			const valueArray = value.split(",");
			const filterObject = { type: key, value: valueArray };
			queryFilters.push(filterObject);
		}
	}
	for (const queryFilter of queryFilters) {
		const filterType = queryFilter.type;
		const filterValues = queryFilter.value;
		for (var a = 0; a < filters.length; a++) {
			if (filters[a].dataset.value !== filterType) {
				continue;
			}
			const options = filters[a].getElementsByClassName("filterOption");
			for (var b = 0; b < options.length; b++) {
				if (filterValues.indexOf(options[b].dataset.value) > -1) {
					const filterObject = { type: filterType, value: filterValues[filterValues.indexOf(options[b].dataset.value)] };
					activeFilters.push(filterObject);
					options[b].classList.add("active");
				}
			}
		}
	}
	feedParent.dataset.activefilters = JSON.stringify(activeFilters);
	updateFeedActiveFilters("add");
	updateFeedActiveItems();
	updateFeedLoadMore();
};
const updateURLSearchParams = (paramsToAdd, paramsToRemove) => {
	//@ts-ignore
	const currentURL = new URL(window.location);
	if (paramsToAdd) {
		//@ts-ignore
		for (const [key, value] of Object.entries(paramsToAdd)) {
			currentURL.searchParams.set(key, value);
		}
	}
	if (paramsToRemove) {
		//@ts-ignore
		for (const [key, value] of Object.entries(paramsToRemove)) {
			// currentURL.searchParams.delete(param);
		}
	}
	const newURL = currentURL.toString();
	history.pushState({ path: newURL }, "", newURL);
};
const presetChildFilters = () => {
	const pathName = window.location.pathname.toLowerCase();
	var filterString = "";
	const targetPaths = [
		{ url: "firm-ground", filter: "?surface=firm" },
		{ url: "soft-ground", filter: "?surface=soft" },
		{ url: "size-6", filter: "?sizes=6" },
		{ url: "size-6-5", filter: "?sizes=6.5" },
		{ url: "size-7", filter: "?sizes=7" },
		{ url: "size-7-5", filter: "?sizes=7.5" },
		{ url: "size-8", filter: "?sizes=8" },
		{ url: "size-8-5", filter: "?sizes=8.5" },
		{ url: "size-9", filter: "?sizes=9" },
		{ url: "size-9-5", filter: "?sizes=9.5" },
		{ url: "size-10", filter: "?sizes=10" },
		{ url: "size-10-5", filter: "?sizes=10.5" },
		{ url: "size-11", filter: "?sizes=11" },
		{ url: "size-11-5", filter: "?sizes=11.5" },
		{ url: "size-12", filter: "?sizes=12" },
		{ url: "black", filter: "?color=black" },
		{ url: "white", filter: "?color=white" },
		{ url: "red", filter: "?color=red" },
		{ url: "blue", filter: "?color=blue" },
		{ url: "orange", filter: "?color=orange" },
		{ url: "neon", filter: "?color=neon" },
		{ url: "vegan", filter: "?collections=devista_vegan" },
		{ url: "clasico", filter: "?collections=devista_clásico" },
		{ url: "devista", filter: "?collections=devista" }
	];
	for (var a = 0; a < targetPaths.length; a++) {
		if (pathName.includes(targetPaths[a].url)) {
			filterString = targetPaths[a].filter;
			break;
		}
	}
	window.history.replaceState({}, "", pathName + filterString);
};
const clearAllQueryParameters = () => {
	//@ts-ignore
	const currentURL = new URL(window.location);
	currentURL.search = "";
	const newURL = currentURL.toString();
	history.pushState({ path: newURL }, "", newURL);
	window.location.reload();
};
const goToFeedChildPage = (type, value) => {
	const siteBase = `${window.location.origin}/football-boots/`;
	switch (type) {
		case "surface":
			switch (value) {
				case "firm":
					// window.location.href = `${siteBase}firm-ground/?surface=${value}`;
					window.location.href = `${siteBase}firm-ground/}`;
					return;
				case "soft":
					// window.location.href = `${siteBase}soft-ground/?surface=${value}`;
					window.location.href = `${siteBase}soft-ground/`;
					return;
			}
			return;
		case "sizes":
			const size = value.replace(".", "-");
			// window.location.href = `${siteBase}size-${size}/?sizes=${value}`;
			window.location.href = `${siteBase}size-${size}/`;
			return;
		case "color":
			// window.location.href = `${siteBase}${value}/?color=${value}`;
			window.location.href = `${siteBase}${value}/`;
			return;
		case "gender":
			// window.location.href = `${siteBase}${value}/?gender=${value}`;
			window.location.href = `${siteBase}${value}/`;
			return;
		case "collections":
			switch (value) {
				case "devista":
					// window.location.href = `${siteBase}devista/?collections=${value}`;
					window.location.href = `${siteBase}devista/`;
					return;
				case "devista_vegan":
					// window.location.href = `${siteBase}vegan/?collections=${value}`;
					window.location.href = `${siteBase}vegan/`;
					return;
				case "devista_clásico":
					// window.location.href = `${siteBase}clasico/?collections=${value}`;
					window.location.href = `${siteBase}clasico/?`;
					return;
			}
	}
};
const handleFeedFilterOptionClick = (event) => {
	preventDefaultFunction(event);
	var updateMethod = "add";
	var activeFilterIndex = -1;
	const parent = document.getElementById("productResultsFeed");
	const target = event.currentTarget || event.target;
	const filter = target.closest(".filter");
	const filterOption = target.closest(".filterOption");
	var filterValue = filterOption.dataset.value || "";
	const activeFilters = JSON.parse(parent.dataset.activefilters) || [];
	const filterType = filter.dataset.value || "";
	const filterObject = { type: filterType, value: filterValue };
	activeFilters.forEach((activeFilter, key) => {
		if (activeFilter.type === filterType && activeFilter.value === filterValue) {
			activeFilterIndex = key;
		}
	});
	if (filterOption.classList.contains("active")) {
		if (activeFilterIndex > -1) {
			activeFilters.splice(activeFilterIndex, 1);
		}
		updateMethod = "remove";
		filterOption.classList.remove("active");
	} else {
		if (activeFilterIndex === -1) {
			activeFilters.push(filterObject);
		}
		filterOption.classList.add("active");
	}
	if (window.location.search === "" && updateMethod === "add") {
		goToFeedChildPage(filterType, filterValue);
		return;
	}
	const currentParamValue = getQueryParameterValue(window.location.href, filterType);
	if (currentParamValue) {
		if (updateMethod === "add" && currentParamValue.indexOf(filterValue) === -1) {
			filterValue = `${currentParamValue},${filterValue}`;
		} else {
			const currentParamValueArray = currentParamValue.split(",");
			const currentParamValueIndex = currentParamValueArray.indexOf(filterValue);
			currentParamValueArray.splice(currentParamValueIndex, 1);
			filterValue = currentParamValueArray.join(",");
		}
	}
	filterValue = encodeURIComponent(filterValue);
	parent.dataset.activefilters = JSON.stringify(activeFilters);
	updateURLSearchParams({ [filterType]: filterValue });
	updateFeedActiveFilters(updateMethod);
	updateFeedActiveItems();
	updateFeedLoadMore();
};
const setFilterCountToMobileButtons = (count = 0) => {
	const parent = document.getElementById("productResultsFeed");
	const filterButtonContainer = parent.getElementsByClassName("mobile-filter-buttons")[0];
	const buttons = filterButtonContainer.getElementsByTagName("BUTTON");
	for (var a = 0; a < buttons.length; a++) {
		const countContainer = buttons[a].getElementsByTagName("SPAN")[0];
		countContainer.innerText = `(${count})`;
	}
};
const handleFeedActiveFilterClick = (event, filter) => {
	preventDefaultFunction(event);
	const parent = document.getElementById("productResultsFeed");
	const target = event.currentTarget || event.target;
	const filterContainer = target.closest(".filterContainer");
	const activeFilters = JSON.parse(parent.dataset.activefilters) || [];
	const filters = filterContainer.getElementsByClassName("filters")[0];
	const filterOptions = filters.getElementsByClassName("filterOption");
	var activeFilterIndex = -1;
	var updateMethod = "remove";
	activeFilters.forEach((activeFilter, key) => {
		if (activeFilter.type === filter.type && activeFilter.value === filter.value) activeFilterIndex = key;
	});
	for (let i = 0; i < filterOptions.length; i++) {
		if (filterOptions[i].dataset.value !== filter.value) continue;
		if (activeFilterIndex > -1) activeFilters.splice(activeFilterIndex, 1);
		filterOptions[i].classList.remove("active");
		break;
	}
	const currentParamValue = getQueryParameterValue(window.location.href, filter.type);
	if (currentParamValue) {
		const currentParamValueArray = currentParamValue.split(",");
		const currentParamValueIndex = currentParamValueArray.indexOf(filter.value);
		currentParamValueArray.splice(currentParamValueIndex, 1);
		filter.value = currentParamValueArray.join(",");
	}
	filter.value = encodeURIComponent(filter.value);
	updateURLSearchParams({ [filter.type]: filter.value });
	parent.dataset.activefilters = JSON.stringify(activeFilters);
	updateFeedActiveFilters(updateMethod);
	updateFeedActiveItems();
	updateFeedLoadMore();
};
const handleFeedSortOptionClick = (event) => {
	const parent = document.getElementById("productResultsFeed");
	const target = event.currentTarget || event.target;
	const sortOption = target.closest(".sortOption");
	const feed = parent.getElementsByClassName("feed")[0];
	const sortContainer = parent.getElementsByClassName("sortContainer")[0];
	const feedInner = feed.getElementsByClassName("inner")[0];
	const sortOptions = sortContainer.getElementsByClassName("sortOption");
	var sortOptionValue = sortOption.dataset.value || "newest";
	if (sortOption.classList.contains("active")) {
		sortOptionValue = "newest";
	}
	for (let i = 0; i < sortOptions.length; i++) {
		if (sortOptions[i] === sortOption) {
			sortOptions[i].classList.toggle("active");
			continue;
		}
		sortOptions[i].classList.remove("active");
	}
	sortFeedItems(feedInner, sortOptionValue);
};
const handleFeedItemVariantChange = (event) => {
	const target = event.currentTarget || event.target;
	const targetImage = target.dataset.image || "";
	const feedItem = target.closest(".item");
	const picture = feedItem.getElementsByTagName("picture")[0];
	const image = picture.getElementsByTagName("img")[0];
	const colorVariantContainer = target.closest(".colorVariants");
	const colorVariants = colorVariantContainer.getElementsByClassName("colorVariant");
	for (var i = 0; i < colorVariants.length; i++) {
		colorVariants[i].classList.remove("active");
	}
	target.classList.add("active");
	image.setAttribute("src", targetImage);
};
const updateFeedActiveFilters = (updateType) => {
	const feedParent = document.getElementById("productResultsFeed");
	const activeFiltersContainer = feedParent.getElementsByClassName("activeFilters")[0];
	var activeFilters = JSON.parse(feedParent.dataset.activefilters) || [];
	const filters = feedParent.getElementsByClassName("filter");
	for (let i = 0; i < filters.length; i++) {
		const filter = filters[i];
		const filterCount = filter.getElementsByClassName("count")[0];
		const currentFilterCount = parseInt(filterCount.dataset.count) || 0;
		switch (updateType) {
			case "add":
				filterCount.dataset.count = currentFilterCount + 1;
				filterCount.innerText = currentFilterCount + 1 ? `(${currentFilterCount + 1})` : "";
			case "remove":
				filterCount.dataset.count = currentFilterCount - 1 > 0 ? currentFilterCount - 1 : 0;
				filterCount.innerText = currentFilterCount - 1 > 0 ? `(${currentFilterCount - 1})` : "";
		}
	}
	if (activeFilters.length <= 0) {
		activeFiltersContainer.classList.remove("active");
		activeFiltersContainer.innerHTML = "";
	} else {
		var activeFilterInnerHtml = `<ul>`;
		activeFilters.forEach((activeFilter) => {
			var filterContent = activeFilter.type;
			switch (activeFilter.type) {
				case "surface":
					filterContent = activeFilter.value === "firm" ? "Firm ground" : "Soft ground";
					break;
				case "sizes":
					filterContent = "Size " + activeFilter.value;
					break;
				default:
					filterContent = activeFilter.value;
					break;
			}
			activeFilterInnerHtml += `<li>
        <button data-type="${activeFilter.type}" onclick="handleFeedActiveFilterClick(event, {type: '${activeFilter.type}', value: '${activeFilter.value}'})">
          <p>${filterContent.replace("_", " ")}</p>
          <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
            <path d="M1 9L5.00001 5.00002M5.00001 5.00002L9 1M5.00001 5.00002L1 1M5.00001 5.00002L9 9" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </button>
      </li>`;
		});
		activeFilterInnerHtml += `<li class="clear">
					<button onclick="clearFeedActiveFilters(event)">
						<p>Clear all</p>
						<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
							<g>
								<circle cx="6" cy="6" r="5.75" fill="white" stroke="black" stroke-width="0.5" />
								<path d="M4 8L6.00001 6.00001M6.00001 6.00001L8 4M6.00001 6.00001L4 4M6.00001 6.00001L8 8" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
							</g>
						</svg>
					</button>
				</li></ul>`;
		activeFiltersContainer.innerHTML = activeFilterInnerHtml;
		activeFiltersContainer.classList.add("active");
	}
	setFilterCountToMobileButtons(activeFilters.length);
};
const updateFeedActiveItems = (countDelta = 0) => {
	const feedParent = document.getElementById("productResultsFeed");
	const defaultFeedCount = parseInt(feedParent.dataset.defaultfeedcount) || 0;
	const feed = feedParent.getElementsByClassName("feed")[0];
	const feedItems = feed.getElementsByClassName("item");
	var feedCount = parseInt(feedParent.dataset.feedcount) || countDelta;
	var activeFilters = JSON.parse(feedParent.dataset.activefilters) || [];
	if (countDelta === 0) {
		feedCount = defaultFeedCount;
	}
	if (activeFilters.length <= 0) {
		for (var i = 0; i < feedItems.length; i++) {
			if (i <= feedCount + countDelta - 1) {
				feedItems[i].classList.add("active");
			} else {
				feedItems[i].classList.remove("active");
			}
		}
	} else {
		var activeItemsCount = 0;
		for (var j = 0; j < feedItems.length; j++) {
			const feedItem = feedItems[j];
			var filtersObject = {
				surface: false,
				sizes: false,
				color: false,
				gender: false,
				collections: false
			};
			var showObject = {
				surface: false,
				sizes: false,
				color: false,
				gender: false,
				collections: false
			};
			feedItem.classList.remove("active");
			feedItem.classList.remove("show");
			for (var k = 0; k < activeFilters.length; k++) {
				const activeFilter = activeFilters[k];
				switch (activeFilter.type) {
					case "surface":
						filtersObject.surface = true;
						if (feedItem.dataset.surface === activeFilter.value) {
							showObject.surface = true;
						}
						break;
					case "sizes":
						filtersObject.sizes = true;
						if (JSON.parse(feedItem.dataset.sizes).indexOf(activeFilter.value) > -1) {
							showObject.sizes = true;
						}
						break;
					case "color":
						filtersObject.color = true;
						if (JSON.parse(feedItem.dataset.color).indexOf(activeFilter.value) > -1) {
							showObject.color = true;
						}
						break;
					case "gender":
						filtersObject.gender = true;
						if (feedItem.dataset.gender === activeFilter.value) {
							showObject.gender = true;
						}
						break;
					case "collections":
						filtersObject.collections = true;
						if (feedItem.dataset.collection === activeFilter.value) {
							showObject.collections = true;
						}
						break;
				}
			}
			if (!filtersObject.surface) {
				showObject.surface = true;
			}
			if (!filtersObject.sizes) {
				showObject.sizes = true;
			}
			if (!filtersObject.color) {
				showObject.color = true;
			}
			if (!filtersObject.gender) {
				showObject.gender = true;
			}
			if (!filtersObject.collections) {
				showObject.collections = true;
			}
			if (showObject.surface && showObject.sizes && showObject.color && showObject.gender && showObject.collections) {
				if (activeItemsCount < feedCount + countDelta) {
					feedItem.classList.add("active");
				}
				feedItem.classList.add("show");
				activeItemsCount++;
			}
		}
	}
	if (feedCount + countDelta > feedItems.length) {
		feedParent.dataset.feedcount = feedItems.length;
	} else if (feedCount + countDelta < 0) {
		feedParent.dataset.feedcount = defaultFeedCount;
	} else {
		feedParent.dataset.feedcount = feedCount + countDelta;
	}
};
const updateFeedLoadMore = () => {
	const feedParent = document.getElementById("productResultsFeed");
	const feed = feedParent.getElementsByClassName("feed")[0];
	const feedItems = feed.getElementsByClassName("item");
	const loadMoreContainer = feed.getElementsByClassName("loadMore")[0];
	const activeFeedItems = feed.getElementsByClassName("item active");
	const showFeedItems = feed.getElementsByClassName("item show");
	const resultsContainer = feed.getElementsByClassName("results")[0];
	const feedCount = parseInt(feedParent.dataset.feedcount) || 0;
	var activeFilters = JSON.parse(feedParent.dataset.activefilters) || [];
	var resultString = `Showing ${feedCount} of ${feedItems.length} results`;
	var showButton = true;
	loadMoreContainer.classList.add("hidden");
	if (activeFilters.length <= 0) {
		resultString = `Showing ${feedCount} of ${feedItems.length} results`;
		if (feedItems.length <= feedCount) {
			resultString = `Showing all ${feedItems.length} results`;
			showButton = false;
		}
	} else {
		if (activeFeedItems.length === 0 || showFeedItems.length === 0) {
			resultString = `No results found`;
			showButton = false;
		} else if (showFeedItems.length <= feedCount) {
			resultString = `Showing all results`;
			showButton = false;
		} else {
			resultString = `Showing ${activeFeedItems.length} of ${showFeedItems.length} results`;
		}
	}
	if (showButton) {
		loadMoreContainer.classList.remove("hidden");
	}
	resultsContainer.innerText = resultString;
};
const clearFeedActiveFilters = (event) => {
	preventDefaultFunction(event);
	const feedParent = document.getElementById("productResultsFeed");
	const filters = feedParent.getElementsByClassName("filter");
	const filterOptions = feedParent.getElementsByClassName("filterOption");
	const activeFiltersContainer = feedParent.getElementsByClassName("activeFilters")[0];
	for (var i = 0; i < filterOptions.length; i++) {
		filterOptions[i].classList.remove("active");
	}
	for (let i = 0; i < filters.length; i++) {
		const filterCount = filters[i].getElementsByClassName("count")[0];
		filterCount.dataset.count = 0;
		filterCount.innerText = "";
	}
	activeFiltersContainer.classList.remove("active");
	activeFiltersContainer.innerHTML = "";
	feedParent.dataset.activefilters = "[]";
	updateFeedActiveItems();
	updateFeedLoadMore();
	setFilterCountToMobileButtons(0);
	clearAllQueryParameters();
};
const sortFeedItems = (parent, sortOption) => {
	const elements = Array.from(parent.children);
	switch (sortOption) {
		case "featured":
			const sortOrder = ["new", "bestseller", "none"];
			elements.sort((a, b) => {
				const aValue = a.dataset.featuretag;
				const bValue = b.dataset.featuretag;
				if (sortOrder.indexOf(aValue) === -1) {
					return -2;
				}
				if (sortOrder.indexOf(aValue) === sortOrder.indexOf(bValue)) {
					return 0;
				}
				if (sortOrder.indexOf(aValue) < sortOrder.indexOf(bValue)) {
					return -1;
				}
				if (sortOrder.indexOf(aValue) > sortOrder.indexOf(bValue)) {
					return 1;
				}
				return -2;
			});
			break;
		case "bestseller":
			const bestSellerSortOrder = ["bestseller", "new", "none"];
			elements.sort((a, b) => {
				const aValue = a.dataset.featuretag;
				const bValue = b.dataset.featuretag;
				if (bestSellerSortOrder.indexOf(aValue) === -1) {
					return -2;
				}
				if (bestSellerSortOrder.indexOf(aValue) === bestSellerSortOrder.indexOf(bValue)) {
					return 0;
				}
				if (bestSellerSortOrder.indexOf(aValue) > bestSellerSortOrder.indexOf(bValue)) {
					return 1;
				}
				return -1;
			});
			break;
		case "newest":
			elements.sort((a, b) => {
				const aValue = new Date(a.dataset.date).getTime();
				const bValue = new Date(b.dataset.date).getTime();
				if (aValue < bValue) {
					return 1;
				}
				if (aValue > bValue) {
					return -1;
				}
				return 0;
			});
			break;
		case "priceLowToHigh":
			elements.sort((a, b) => {
				const aValue = parseInt(a.dataset.price);
				const bValue = parseInt(b.dataset.price);
				return aValue - bValue;
			});
			break;
		case "priceHighToLow":
			elements.sort((a, b) => {
				const aValue = parseInt(a.dataset.price);
				const bValue = parseInt(b.dataset.price);
				return bValue - aValue;
			});
			break;
	}
	elements.forEach((element) => {
		parent.appendChild(element);
	});
};
window.addEventListener("load", () => {
	presetChildFilters();
	handleFiltersOnLoad();
});
