<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <script src="https://balkangraph.com/js/latest/OrgChart.js"></script>

    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Masukkan Tajuk Struktur Carta Organisasi" aria-label="Recipient's username" aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Simpan</button>
    </div>
    <div style="border: 3px solid black">
        <div id="tree"></div>
    </div>
    <script>
        window.onload = function() {
            OrgChart.templates.ana.plus = '<circle cx="15" cy="15" r="15" fill="#ffffff" stroke="#aeaeae" stroke-width="1"></circle>' +
                '<text text-anchor="middle" style="font-size: 18px;cursor:pointer;" fill="#757575" x="15" y="22">{collapsed-children-count}</text>';

            OrgChart.templates.invisibleGroup.padding = [20, 0, 0, 0];

            var chart = new OrgChart(document.getElementById("tree"), {
                template: "ana",
                enableDragDrop: true,
                assistantSeparation: 170,
                menu: {
                    pdfPreview: {
                        text: "Export to PDF",
                        icon: OrgChart.icon.pdf(24, 24, '#7A7A7A'),
                        onClick: preview
                    },
                    csv: {
                        text: "Save as CSV"
                    }
                },
                nodeMenu: {
                    details: {
                        text: "Details"
                    },
                    edit: {
                        text: "Edit"
                    },
                    add: {
                        text: "Add"
                    },
                    remove: {
                        text: "Remove"
                    }
                },
                align: OrgChart.ORIENTATION,
                toolbar: {
                    fullScreen: true,
                    zoom: true,
                    fit: true,
                    expandAll: true
                },
                nodeBinding: {
                    field_0: "name",
                    field_1: "title",
                    img_0: "img"
                },
                tags: {
                    "top-management": {
                        template: "invisibleGroup",
                        subTreeConfig: {
                            orientation: OrgChart.orientation.bottom,
                            collapse: {
                                level: 1
                            }
                        }
                    },
                    "it-team": {
                        subTreeConfig: {
                            layout: OrgChart.mixed,
                            collapse: {
                                level: 1
                            }
                        },
                    },
                    "hr-team": {
                        subTreeConfig: {
                            layout: OrgChart.treeRightOffset,
                            collapse: {
                                level: 1
                            }
                        },
                    },
                    "web-mobile-team": {
                        subTreeConfig: {
                            layout: OrgChart.treeLeftOffset,
                            collapse: {
                                level: 1
                            }
                        },
                    },
                    "seo-menu": {
                        nodeMenu: {
                            addSharholder: {
                                text: "Add new sharholder",
                                icon: OrgChart.icon.add(24, 24, "#7A7A7A"),
                                onClick: addSharholder
                            },
                            addDepartment: {
                                text: "Add new department",
                                icon: OrgChart.icon.add(24, 24, "#7A7A7A"),
                                onClick: addDepartment
                            },
                            addAssistant: {
                                text: "Add new assitsant",
                                icon: OrgChart.icon.add(24, 24, "#7A7A7A"),
                                onClick: addAssistant
                            },
                            edit: {
                                text: "Edit"
                            },
                            details: {
                                text: "Details"
                            },
                        }
                    },
                    "menu-without-add": {
                        nodeMenu: {
                            details: {
                                text: "Details"
                            },
                            edit: {
                                text: "Edit"
                            },
                            remove: {
                                text: "Remove"
                            }
                        }
                    },
                    "department": {
                        template: "group",
                        nodeMenu: {
                            addManager: {
                                text: "Add new manager",
                                icon: OrgChart.icon.add(24, 24, "#7A7A7A"),
                                onClick: addManager
                            },
                            remove: {
                                text: "Remove department"
                            },
                            edit: {
                                text: "Edit department"
                            },
                            nodePdfPreview: {
                                text: "Export department to PDF",
                                icon: OrgChart.icon.pdf(24, 24, "#7A7A7A"),
                                onClick: nodePdfPreview
                            }
                        }
                    }
                }
            });

            chart.on("added", function(sender, id) {
                sender.editUI.show(id);
            });

            chart.on('drop', function(sender, draggedNodeId, droppedNodeId) {
                var draggedNode = sender.getNode(draggedNodeId);
                var droppedNode = sender.getNode(droppedNodeId);

                if (droppedNode.tags.indexOf("department") != -1 && draggedNode.tags.indexOf("department") == -1) {
                    var draggedNodeData = sender.get(draggedNode.id);
                    draggedNodeData.pid = null;
                    draggedNodeData.stpid = droppedNode.id;
                    sender.updateNode(draggedNodeData);
                    return false;
                }
            });

            chart.editUI.on('field', function(sender, args) {
                var isDeprtment = sender.node.tags.indexOf("department") != -1;
                var deprtmentFileds = ["name"];

                if (isDeprtment && deprtmentFileds.indexOf(args.name) == -1) {
                    return false;
                }
            });

            chart.on('exportstart', function(sender, args) {
                args.styles = document.getElementById('myStyles').outerHTML;
            });

            chart.load([{
                    id: 1,
                    pid: 0,
                    name: "Default Node",
                    title: "",
                    img: "U"
                },

            ]);

            function preview() {
                OrgChart.pdfPrevUI.show(chart, {
                    format: 'A4'
                });
            }

            function nodePdfPreview(nodeId) {
                OrgChart.pdfPrevUI.show(chart, {
                    format: 'A4',
                    nodeId: nodeId
                });
            }

            function addSharholder(nodeId) {
                chart.addNode({
                    id: OrgChart.randomId(),
                    pid: nodeId,
                    tags: ["menu-without-add"]
                });
            }

            function addAssistant(nodeId) {
                var node = chart.getNode(nodeId);
                var data = {
                    id: OrgChart.randomId(),
                    pid: node.stParent.id,
                    tags: ["assistant"]
                };
                chart.addNode(data);
            }


            function addDepartment(nodeId) {
                var node = chart.getNode(nodeId);
                var data = {
                    id: OrgChart.randomId(),
                    pid: node.stParent.id,
                    tags: ["department"]
                };
                chart.addNode(data);
            }

            function addManager(nodeId) {
                chart.addNode({
                    id: OrgChart.randomId(),
                    stpid: nodeId
                });
            }
        };
    </script>




</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->