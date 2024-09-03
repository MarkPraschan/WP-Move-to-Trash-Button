(function (wp) {
  var registerPlugin = wp.plugins.registerPlugin;
  var PluginPostStatusInfo = wp.editPost.PluginPostStatusInfo;
  var createElement = wp.element.createElement;
  var Button = wp.components.Button;
  var useDispatch = wp.data.useDispatch;
  var __ = wp.i18n.__;

  function MoveToTrashButton() {
    var { trashPost } = useDispatch('core/editor');

    function onTrashClick() {
      if (confirm(__('Are you sure you want to move this post to trash?'))) {
        trashPost();
      }
    }

    return createElement(
      PluginPostStatusInfo,
      { className: 'move-to-trash-button-container' },
      createElement(
        Button,
        {
          isSecondary: true,
          className: 'move-to-trash-button',
          onClick: onTrashClick,
        },
        __('Move to Trash')
      )
    );
  }

  registerPlugin('move-to-trash-button', {
    render: MoveToTrashButton,
    icon: 'trash'
  });

  console.log('Move to Trash Button plugin registered');
})(window.wp);