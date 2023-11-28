const preventDefaultFunction: (event: any) => void = (event) => {
  try {
    event.preventDefault();
    event.stopPropagation();
  } catch (error: any) {
    console.error(error);
  }
};
