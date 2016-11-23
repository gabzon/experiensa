const catalog = {state = [],action} => {
  switch (action.type){
    case 'REQUEST_CATALOG':
      return [
        ...state,
        item(undefined,action);
      ]
      break;
    default:
      return state;
  }
}

export default items;
